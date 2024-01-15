<?php

namespace App\Http\Controllers;

use App\Models\CmsHomePage;
use App\Models\Configuration;
use App\Models\Document;
use App\Http\Controllers\Admin\Booking;
use App\Models\Location;
use App\Models\Partner;
use App\Notifications\MorayLimousineNotifications;
use App\Rules\MatchOldPassword;
use App\Models\UploadedDocument;
use App\Models\User;
use App\Models\UsersMedia;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DB;
use Auth;
use Validator;

class PartnerController extends Controller
{
    private $partner;
    private $uploadedDocument;
    private $vehicle;
    private $user;


    public function __construct(User $user, Partner $partner, UploadedDocument $uploadedDocument, Vehicle $vehicle)
    {
        $this->partner = $partner;
        $this->uploadedDocument = $uploadedDocument;
        $this->vehicle = $vehicle;
        $this->user = $user;
    }

    protected $validationRules =   [
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|string|email|max:255|unique:users',
        'phone_number' => 'required|max:25',
        'password' => 'required|string|min:6|confirmed',
        'user_type' => 'required|string|max:15',
    ];
    /**
     * @var array
     */
    protected $VehicleValidationRules = [
        'title' => 'required|max:50|string',
        'vehicleCategory_id' => 'required',
        'engine_capacity' => 'required|string',
        'transmission' => 'required|string',
        'fuel_type' => 'required|string|max:20',
        'plate' => 'required|string|max:40',
        'model_no' => 'required|string|max:40'
    ];

    /**
     * @var array
     */
    public $partnerRules = [
        'user_id' => 'required',
    ];

    public function profileView()
    {
        $documents = auth()->user()->uploadedDocuments;
        return view('partner.profile-view')->with('documents', $documents);
    }

    /** Form view to user enter profile details
     * @return Factory|View
     */
    public function buildProfile()
    {
        $data['locations'] = Location::all();
        $data['config'] = Configuration::first();
        return view('partner.build-profile', $data);
    }

    /**
     * Save and Update Driver Profile
     * @param Request $request
     * @return string
     */
    public function storePartner(Request $request)
    {
        $locations = $request->locations;
        $id = null;
        $id = $request['id'];
        $imageName = null;
        $media = new UsersMedia();
        if ($request->hasFile('image_name')) {
            $imageName = time() . $request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('uploaded-user-images/endusers-images'), $imageName);
        }

        if ($id == null) {
            $this->validate($request, $this->partnerRules);
            $formdata = $request->except(['image_name', 'document_img', 'document_title', 'locations']);
            $user = $this->partner->createProfile($formdata, $locations);
            if (isset($imageName)) {
                $media->saveUserImage($imageName, Auth()->id());
            }
        }
        //        Update Partner profile
        else {
            $formdata = $request->except(['_token', 'image_name', 'document_img', 'document_title', 'locations']);
            $this->validate($request, $this->partnerRules);
            $locations = $request->locations;
            $this->partner->updateProfile($formdata, $id, $locations);
            if (isset($imageName)) {
                if (Auth()->user()->userMedia()->first()) {
                    $media->updateUserImage($imageName, Auth()->id());
                } else {
                    $media->saveUserImage($imageName, Auth()->id());
                }
            }
        }

        return redirect(route('partner.profile'));
    }


    /**
     * @param $id
     * @return Factory|View
     */
    public function updateProfile($id)
    {

        $data['user'] = Partner::find($id);
        $data['documents'] = Document::all();
        $data['locations'] = Location::all();
        $data['config'] = Configuration::first();
        return view('partner.build-profile', $data);
    }

    /**
     * @return Factory|View
     */
    public function becomePartner()
    {
        return view('home.become-partner');
    }

    /**
     * @return Factory|View
     */
    public function partnerDashboard()
    {
        $data['bookings'] = auth()->user()->booking()->get();
        $data['canceled_bookings'] = auth()->user()->booking->where('booking_status', 'canceled');
        $data['pending_bookings'] = auth()->user()->booking->where('booking_status', 'pending');
        $data['completed_bookings'] = auth()->user()->booking->where('booking_status', 'completed');
        return view('partner.partner-dashboard', $data);
    }

    /**
     * @return Factory|View
     */
    public function addNewDriver()
    {
        $drivers = auth()->user()->users;
        return view('partner.partner-drivers-list')->with('drivers', $drivers);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function approveDriver(Request $request)
    {
        $id = $request->id;
        $user =  auth()->user()->users()->find($id);
        $user->pivot->status = "active";
        $user->pivot->update();
        $data['drivers'] = auth()->user()->users;
        return view('parshall-views._driver-list-table', $data);
    }


    /**
     * @param Request $request
     * @return Factory|View
     */
    public function disapproveDriver(Request $request)
    {
        $id = $request->id;
        $user =  auth()->user()->users()->find($id);
        $user->pivot->status = "blocked";
        $user->pivot->update();
        $data['drivers'] = auth()->user()->users;
        return view('parshall-views._driver-list-table', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function blockDriver(Request $request)
    {
        $id = $request->id;
        $user =  User::find($id);
        $user->status = 'blocked';
        $user->save();
        $drivers = User::where('user_type', 'driver')
            ->where('creator_id', Auth()->id())->orderBy('id', 'desc')->get();
        $data['drivers'] = $drivers;
        return view('parshall-views._driver-list-table', $data);
    }

    /**
     * @param $id
     * @return Factory|View
     * Driver Details View
     */
    public function driverDetails($id)
    {
        $data['user'] = User::find($id);
        return view('partner.driver-details', $data);
    }

    /** Return view of add driver Form
     * @return Factory|View
     */
    public function addNewVehicle()
    {
        $data['category'] = VehicleCategory::all();
        $data['locations'] = Location::all();
        return view('partner.add-vehicle', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveVehicle(Request $request)
    {
        $image = $request['image_name'];
        $id = $request->ID;
        $this->validate($request, $this->VehicleValidationRules);
        $formData = $request->all();
        $locations = $request->locations;

        //save Image to Directory
        if ($request->hasFile('image_name')) {
            $image = time() . $request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('admin-vehicle-img'), $image);
            $formData['image_name'] = $image;
        }
        if (isset($id)) {
            $formData = $request->except('_token', 'locations');
            if ($image != null or '') {
                $formData['image_name'] = $image;
            }
            $formData['status'] = 'pending';
            $vehicle = $this->vehicle->updateVehicle($formData, $id, $locations);
            return redirect(url('partner/update-vehicle/' . $id))->with('success', 'Vehicle has been Updated added');
        } else {
            $new_vehicle =  $this->vehicle->createNewVehicle($formData, $locations);
            $user = auth()->user();
            $user->notify(new MorayLimousineNotifications($this->vehicle_added_partner));
            $users = User::where('user_type', 'admin')->get();
            $msg = $this->notifyVehicleAdded($new_vehicle->id);
            Notification::send($users, new MorayLimousineNotifications($msg));
            return redirect(url('partner/update-vehicle/' . $new_vehicle->id))->with('success', 'Vehicle has been added');
        }
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function updateVehicle($id)
    {
        $data['category'] = VehicleCategory::all();
        $data['vehicle'] =  Vehicle::find($id);
        $data['locations'] =  Location::all();
        $data['vehicle_documents'] =  Document::where('applied_on', 'vehicle')->get();
        $data['uploaded_docs'] = $data['vehicle']->documents;
        //        if(!$data['vehicle']){
        //            return redirect(url('admin/vehicle-list'))->with('error','Vehicle not found!');
        //        }
        return view('partner.add-vehicle', $data);
    }

    /** Return Vehicle Listings View
     * @return Factory|View
     */
    public function vehiclesList()
    {
        $data['vehicles'] = Vehicle::where('creator_id', Auth()->id())->get();
        return view('partner.partner-vehicles-list', $data);
    }



    public function partnerNotifications()
    {
        $notifications = auth()->user()->notifications()->where('read_at', '!=', null)->orderBy('id', 'desc')->get();
        return view('partner.partner-notifications')->with('notifications', $notifications);
    }

    /**
     * Retrun Partners All Bookings Page
     * @return Factory|View
     */
    public function partnerReservations()
    {
        $data['canceled_bookings'] = auth()->user()->booking->where('booking_status', 'canceled');
        $data['pending_bookings'] = auth()->user()->booking->where('booking_status', 'pending');
        $data['completed_bookings'] = auth()->user()->booking->where('booking_status', 'completed');
        $data['bookings'] = auth()->user()->booking->sortByDesc('created_at');
        return view('partner.partner-reservations', $data);
    }

    /**
     * @return Factory|View
     */
    public function partnerAllBookings()
    {
        $data['bookings'] = auth()->user()->booking->sortByDesc('created_at');
        return view('parshall-views._partner-bookings-table', $data);
    }

    /**
     * @return Factory|View
     */
    public function partnerCanceledBookings()
    {
        $data['bookings'] = auth()->user()->booking->where('booking_status', 'canceled');
        return view('parshall-views._partner-bookings-table', $data);
    }

    /**Bookings By date
     * @param Request $request
     * @return Factory|View
     */
    public function bookingsByDate(Request $request)
    {
        $data['bookings'] = auth()->user()->booking
            ->where('pick_date', '>=',  $request['from_date'])
            ->where('pick_date', '<=', $request['to_date']);
        return view('parshall-views._partner-bookings-table', $data);
    }


    /**
     * @return Factory|View
     */
    public function partnerPendingBookings()
    {
        $data['bookings'] = auth()->user()->booking->where('booking_status', 'pending');
        return view('parshall-views._partner-bookings-table', $data);
    }

    /**
     * @return Factory|View
     */
    public function partnerCompletedBookings()
    {
        $data['bookings'] = auth()->user()->booking->where('booking_status', 'completed');
        return view('parshall-views._partner-bookings-table', $data);
    }

    /**
     * @return Factory|View
     */
    public function changePasswordForm()
    {
        return view('partner.partner-change-password');
    }

    /**
     * @return Factory|View
     */
    public function uploadDocuments()
    {
        $data['documents'] = Document::where('applied_on', 'partner')->get();
        $data['userDocuments'] = auth()->user()->uploadedDocuments;
        return view('partner.documents', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeDocuments(Request $request)
    {
        $imageName = null;
        if ($request->hasFile('document_img')) {
            $imageName = time() . $request->document_img->getClientOriginalName();
            $request->document_img->move(public_path('uploaded-user-images/partner-documents'), $imageName);
        }
        $documents_data = $request->only('document_title');
        $edit_id = $request->edit_id;
        if ($edit_id == null) {
            $documents = auth()->user()->uploadedDocuments()->where('document_title', $documents_data)->get();
            if (count($documents) > 0) {
                return redirect(url('partner/manage-documents'))->with('error', 'Error ! This Document ( ' . $documents_data['document_title'] . ' )  Already Exist You Can Edit It If you Want.');
            }
            $documents_data['document_img'] = $imageName;
            $document = $this->uploadedDocument->saveDocuments($documents_data);
        } else {
            if (isset($imageName)) {
                $documents_data['document_img'] = $imageName;
            }

            $this->uploadedDocument->updateDocument($documents_data, $edit_id);
        }
        //mail for admin while attacheing doucment
        //notify admin
        $admin = User::where('user_type', 'admin')->first();
        $registered_msg = $this->notifyDocumentMsg;
        $admin->notify(new MorayLimousineNotifications($registered_msg));
        return redirect(url('partner/manage-documents'))->with('success', 'Success ! Document Is Saved Successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteDocument($id)
    {
        $document = UploadedDocument::find($id);
        if ($document) {
            $document->delete();
        }
        return redirect(url('partner/manage-documents'))->with('success', 'Document Is Deleted Successfully ');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeVehicleDocs(Request $request)
    {
        $imageName = null;
        if ($request->hasFile('document_img')) {
            $imageName = time() . $request->document_img->getClientOriginalName();
            $request->document_img->move(public_path('uploaded-user-images/partner-documents'), $imageName);
        }
        $documents_data = $request->only('document_title');
        $edit_id = $request->edit_id;
        $vehicle_id = $request->vehicle_id;
        if ($edit_id == null) {
            $documents = $this->vehicle->find($vehicle_id)->documents()->where('document_title', $documents_data)->get();
            if (count($documents) > 0) {
                return redirect(url('partner/update-vehicle/' . $vehicle_id))->with('error', 'Error ! This Document ( ' . $documents_data['document_title'] . ' )  Already Exist You Can Edit It If you Want.');
            }
            $documents_data['document_img'] = $imageName;
            $document = $this->uploadedDocument->saveVehicleDocuments($documents_data, $vehicle_id);
        } else {
            if (isset($imageName)) {
                $documents_data['document_img'] = $imageName;
            }
            $this->uploadedDocument->updateVehicleDocument($documents_data, $edit_id, $vehicle_id);
        }
        return redirect(url('partner/update-vehicle/' . $vehicle_id))->with('success', 'Success ! Document Is Saved Successfully');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function changePassword(Request $request)
    { {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            User::find(auth()->id())->update(['password' => Hash::make($request->new_password)]);
            return redirect()->route('partner.edit.password')->with('success', 'Success ..! Password Is Changed Successfully !');
        }
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function saveNewDriver(Request $request)
    {
        $this->validate($request, $this->validationRules);
        $user = $this->user->registerDriver($request->all());
        $driver_id =  $user->id;
        auth()->user()->users()->attach($driver_id, ['status' => 'active']);
        //notify admin
        $admin = User::where('user_type', 'admin')->first();
        $registered_msg = array_merge($this->notifyDriverMsg, ['body' => 'A New Partner On Hathaway Limousines Added You As Driver For More Details visit web']);
        $user->notify(new MorayLimousineNotifications($registered_msg));
        $registered_msg = array_merge($this->adminnotifyDriverMsg, ['body' => 'A New Driver On Hathaway Limousines is Added']);
        $admin->notify(new MorayLimousineNotifications($registered_msg));
        return redirect(route('partner.driver.list'))->with('success', '"Success... !" New Driver Created Successfully ');
    }

    /** Search Drivers and add by Partner
     *
     *
     * @param Request $request
     * @return mixed
     */
    public function addDriver(Request $request)
    {
        $search_qry = $request->search_qry;
        $data['drivers'] = User::where('user_type', 'driver')
            ->where('email', $search_qry)->get();
        return  view('parshall-views._searched_driver', $data);
    }

    /**
     * @return Factory|View
     */
    public function searchByEmail()
    {
        $partners = $this->user->where('user_type', 'partner')->where('status', 'disapproved')->orderBy('id', 'desc')->get();
        return view('parshall-views._partner-list-table')->with('partners', $partners);
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function addNewDriverByEmail($id)
    {
        $check_driver = auth()->user()->users()->find($id);
        //        if driver already in list
        if ($check_driver != null or isset($check_driver)) {
            return redirect()->back()->with('error', '"Error .. !  " This Driver Is Already In Your Drivers List.');
        }
        //        Add Driver In list
        else {
            auth()->user()->users()->attach($id);
            //            Notifications and email Text
            $driver = $this->user->findPartner($id);
            $driver->notify(new MorayLimousineNotifications($this->notifyDriverMsg));
            return redirect()->back()->with('success', '"Success .. !  "A New Driver Is Added In Your Drivers List');
        }
    }


    /**
     * @return Factory|View
     */
    public function allPartners()
    {
        $partners = $this->user->where('user_type', 'partner')->orderBy('id', 'desc')->get();
        return view('parshall-views._partner-list-table')->with('partners', $partners);
    }
    /**
     * @return Factory|View
     */
    public function pendingPartners()
    {
        $partners = $this->user->where('user_type', 'partner')->where('status', 'pending')->orderBy('id', 'desc')->get();
        return view('parshall-views._partner-list-table')->with('partners', $partners);
    }
    /**
     * @return Factory|View
     */
    public function approvedPartners()
    {
        $partners = $this->user->where('user_type', 'partner')->where('status', 'approved')->orderBy('id', 'desc')->get();
        return view('parshall-views._partner-list-table')->with('partners', $partners);
    }
    /**
     * @return Factory|View
     */
    public function disapprovedPartners()
    {
        $partners = $this->user->where('user_type', 'partner')
            ->where('status', 'disapproved')->orderBy('id', 'desc')->get();
        return view('parshall-views._partner-list-table')->with('partners', $partners);
    }
    /**
     * @return Factory|View
     */
    public function blockedPartners()
    {
        $partners = $this->user->where('user_type', 'partner')->where('status', 'blocked')->orderBy('id', 'desc')->get();;
        return view('parshall-views._partner-list-table')->with('partners', $partners);
    }

    //get city vehicles
    public function get_city_vehicle(Request $request)
    {
        $cityid = $request->cityid;
        $rquirements = DB::table('operate_city_requirements')->where('city_id', $cityid)->get();

        $list = '';
        foreach ($rquirements as $req) {
            $myarray = explode(',', $req->requirements);
            $list .= '<div class="service-class-list"> <h4>' . $req->main_heading . '</h4></div>';
            $list .= '<ul>';
            foreach ($myarray as $arr) {
                $list .= ' <li>' . $arr . '</li>';
            }
            $list .= '</ul>';
        }
        echo $list;
    }
    //get doucments
    public function get_city_document(Request $request)
    {
        $cityid = $request->cityid;
        $rquirements = DB::table('operate_city_requirements')->where('city_id', $cityid)->get();
        $list = '';
        foreach ($rquirements as $req) {
            $myarray = explode(',', $req->documents);
            $list .= '<div class="service-class-list"> <h4>' . $req->doc_heading . '</h4></div>';
            $list .= '<ul>';
            foreach ($myarray as $arr) {
                $list .= ' <li>' . $arr . '</li>';
            }
            $list .= '</ul>';
        }
        echo $list;
    }
    //get leagal form
    public function get_city_legal_form(Request $request)
    {
        $cityid = $request->cityid;
        $legal_form_data = DB::table('legal_form_of_company')->where('city_id', $cityid)->get();
        $list = '<option value="">Select Legal Form</option>';
        foreach ($legal_form_data as $data) {
            $list .= '<option value=' . $data->id . '>' . $data->legal_form . '</option>';
        }
        echo $list;
    }
    //save basic 
    public function info_basic_save(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            $partner = Partner::where('user_id', Auth::user()->id)->first();
            $partner->step_url = 'info/company';
            $partner->save();
            return redirect('info/company');
        }
    }
    //save company info
    public function save_company(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'legal_form' => 'required',
            'authorizedFname' => 'required',
            'authorizedLname' => 'required',
            'phoneNumber' => 'required',
            'companyAddress' => 'required',
            'city' => 'required',
            'postalCode' => 'required',
            'country' => 'required',
            'vat_sales' => 'required',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->first_name = $request->authorizedFname;
        $user->last_name = $request->authorizedLname;
        $user->phone_number = $request->phoneNumber;
        if ($user->save()) {
            $partner = Partner::where('user_id', $id)->first();
            if (!$partner) {
                $partner = new Partner();
            }
            $partner->address = $request->companyAddress;
            $partner->company_name = $request->company_name;
            $partner->legal_form_company = $request->legal_form;
            $partner->city = $request->city;
            $partner->postal_code = $request->postalCode;
            $partner->vat_sales_tax_no = $request->vat_sales;
            $partner->user_id = $id;
            $partner->phone_number = $request->phoneNumber;
            $partner->country_code = $request->code;
            $partner->default_location = '';
            $partner->country = $request->country;
            $partner->step_url = 'info/driver';
            if ($partner->save()) {
                return redirect('info/driver');
            }
        }
    }
    //save driver info
    public function save_driver(Request $request)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
                'phone_number' => 'required'
            ],
            [
                'email.unique' => 'Please use different email for First Driver',
            ]
        );
        if (isset($request->id) && $request->id != '') {
            $user = User::find($request->id);
            $option = "edit";
        } else {
            $user = new User();
            $option = "add";
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->country_code = $request->code;
        $user->user_type = 'driver';
        $user->creator_id = Auth::user()->id;
        $user->password = Hash::make('driver');
        if ($user->save()) {
            if ($option == "add") {
                event(new Registered($user));
                $approve_msg =  array_merge($this->temporay_driver_message, ['body' => 'Your Temporary password is driver you can change your password after login. ']);
                $user->notify(new MorayLimousineNotifications($approve_msg));
            }
            $partner = Partner::where('user_id', Auth::user()->id)->first();
            $partner->step_url = 'info/vehicle';
            $partner->save();
            return redirect('info/vehicle');
        }
    }
    private $temporay_driver_message = [
        'greeting' => 'Temporary Password',
        'subject' => 'Temporary Password',
        'thanks_text' => 'Thanks For Using Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/driver/dashboard',
    ];
    //save vehicle
    public function save_vehicle(Request $request)
    {
        $this->validate($request, [
            'vehicleCategory_id' => 'required',
            'vehicletitle' => 'required',
            'exterior_color' => 'required',
            'interior_color' => 'required',
            'model_no' => 'required',
            'standard' => 'required',
            'license_plate' => 'required'
        ]);
        if (isset($request->id) && $request->id != '') {
            $vehicle = Vehicle::find($request->id);
        } else {
            $vehicle = new Vehicle();
        }
        $vehicle->title = $request->vehicletitle;
        $vehicle->vehicleCategory_id = $request->vehicleCategory_id;
        $vehicle->interior_color = $request->interior_color;
        $vehicle->exterior_color = $request->exterior_color;
        $vehicle->plate = $request->license_plate;
        $vehicle->model_no = $request->model_no;
        $vehicle->standard = $request->standard;
        $vehicle->creator_id = Auth::user()->id;
        $vehicle->length = '';
        $vehicle->engine_capacity = '';
        $vehicle->fuel_type = '';
        if ($vehicle->save()) {
            $partner = Partner::where('user_id', Auth::user()->id)->first();
            $partner->step_url = 'info/payment';
            $partner->save();
            return redirect('info/payment');
        }
    }
    //save pament info
    public function save_payment(Request $request)
    {
        $this->validate($request, [
            'iban' => ['required', 'regex:^[a-zA-Z]{2}[0-9]{2}\s?[a-zA-Z0-9]{4}\s?[0-9]{4}\s?[0-9]{3}([a-zA-Z0-9]\s?[a-zA-Z0-9]{0,4}\s?[a-zA-Z0-9]{0,4}\s?[a-zA-Z0-9]{0,4}\s?[a-zA-Z0-9]{0,3})?$^'],
            'bicswift' => ['required', 'regex:/^[a-z]{6}[0-9a-z]{2}([0-9a-z]{3})?\z/i'],
        ]);
        $partner = Partner::where('user_id', Auth::user()->id)->first();
        $partner->bank_transfer = 1;
        $partner->bank_account_owner = $request->bank_account_owner;
        $partner->type = $request->account_type;
        $partner->iban = $request->iban;
        $partner->bic_swift = $request->bicswift;
        if ($partner->save()) {
            $partner = Partner::where('user_id', Auth::user()->id)->first();
            $partner->step_url = 'info/documents';
            $partner->save();
            return redirect('info/documents');
        }
    }
    //get info documents
    public function info_documents()
    {
        $documents = Document::select('id', 'applied_on', 'document_title', 'slug', DB::raw('count(document_title) as total'))->groupBy('applied_on')->get();
        return view('information.documents', compact('documents'));
    }
    //inof session
    public function info_session(Request $request)
    {
        $documents = Document::where('applied_on', $request->type)->get();
        $driver = [];
        $vehicle = [];
        if ($request->type == "driver") {
            $driver = User::where(['user_type' => 'driver', 'creator_id' => Auth::user()->id])->first();
        } elseif ($request->type == "vehicle") {
            $vehicle = Vehicle::where(['creator_id' => Auth::user()->id])->first();
        }
        return view('information.session', compact('documents', 'driver', 'vehicle'));
    }
    //upload view
    public function info_upload(Request $request)
    {
        $title = $request->title;
        $type = $request->type;
        $driver = [];
        $vehicle = [];
        $uploadeddoc = UploadedDocument::where(['slug' => $title, 'user_id' => Auth::user()->id])->first();
        if ($request->type == "driver") {
            $driver = User::where(['user_type' => 'driver', 'creator_id' => Auth::user()->id])->first();
            $uploadeddoc = UploadedDocument::where(['slug' => $title, 'user_id' => $driver->id])->first();
        } elseif ($request->type == "vehicle") {
            $vehicle = Vehicle::where(['creator_id' => Auth::user()->id])->first();
        }
        $doc = Document::where('slug', $title)->first();
        return view('information.upload', compact('title', 'type', 'uploadeddoc', 'driver', 'vehicle', 'doc'));
    }
    //upload documents\
    public function info_upload_document(Request $request)
    {

        if ($request->form_type == "Add") {
            $this->validate($request, [
                'file' => 'required',
            ]);
            if (isset($request->file)) {
                $documents_data['document_title'] =  $request->title;
                $documents_data['slug'] =  $request->slug;
                if (isset($request->expiry_date)) {
                    $documents_data['expiry_date'] = $request->expiry_date;
                }
                $imageName = null;
                $imageName1 = null;
                //back image file upload
                if ($file = $request->file('backimage')) {
                    $imageName1 = time() . $file->getClientOriginalName();
                    $file->move(public_path('uploaded-user-images/partner-documents'), $imageName1);
                    $documents_data['document_backimage'] = $imageName1;
                }
                if ($request->hasFile('file')) {
                    $imageName = time() . $request->file->getClientOriginalName();
                    $request->file->move(public_path('uploaded-user-images/partner-documents'), $imageName);
                    $documents_data['document_img'] = $imageName;
                }
                if ($request->type == "driver") {
                    $this->uploadedDocument->saveDriverDocuments($documents_data, $request->driverid);
                } elseif ($request->type == "vehicle") {
                    $this->uploadedDocument->saveVehicleDocuments($documents_data, $request->vehicleid);
                } else {
                    $this->uploadedDocument->saveDocuments($documents_data);
                }
                return redirect('info/session?type=' . $request->type . '');
            }
        } else {
            $edit_id = $request->editid;
            $documents_data['document_title'] =  $request->title;
            $documents_data['slug'] =  $request->slug;
            if (isset($request->expiry_date)) {
                $documents_data['expiry_date'] = $request->expiry_date;
            }
            if (isset($request->file)) {
                $imageName = null;
                $imageName1 = null;
                //back image file upload
                if ($file = $request->file('backimage')) {
                    $imageName1 = time() . $file->getClientOriginalName();
                    $file->move(public_path('uploaded-user-images/partner-documents'), $imageName1);
                    $documents_data['document_backimage'] = $imageName1;
                }
                if ($request->hasFile('file')) {
                    $imageName = time() . $request->file->getClientOriginalName();
                    $request->file->move(public_path('uploaded-user-images/partner-documents'), $imageName);
                    $documents_data['document_img'] = $imageName;
                }
                if ($request->type == "driver") {
                    $this->uploadedDocument->updateDriverDocuments($documents_data, $edit_id, $request->driverid);
                } elseif ($request->type == "vehicle") {
                    $this->uploadedDocument->updateVehicleDocument($documents_data, $edit_id, $request->vehicleid);
                } else {
                    $this->uploadedDocument->updateDocument($documents_data, $edit_id);
                }
            }
            return redirect('info/session?type=' . $request->type . '');
        }
    }
    //partner thanku page
    public function info_thanku()
    {
        $users = User::where('user_type', 'admin')->get();
        Notification::send($users, new MorayLimousineNotifications($this->notifyAdminMsg));
        return view('information.thankyou');
    }
    //check email
    public function check_email(Request $request)
    {
        $check = User::where('email', $request->email)->count();
        if ($check > 0) {
            echo "exist";
        } else {
            echo "noexist";
        }
    }
    protected $notifyAdminMsg = [
        'greeting' => 'A New Partner On Hathaway Limousines is registered ',
        'subject' => 'New Partner have Registered',
        'body'   => 'A New Partner On Hathaway Limousines is registered please approved. For More Details visit web',
        'thanks_text' => 'Thanks For Using Hathaway Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/partner/dashboard'
    ];
    private  $vehicle_added_partner = [
        'greeting' => "New Vehicle is Added Successfully",
        'subject' => 'New Vehicle Added Successfully',
        'body'   => 'You Add a new Vehicle On Hathaway Limousines  Please Upload Vehicle Documents In order to get Approved By Admin ! Enjoy With Us.  ',
        'thanks_text' => 'Thanks For Using Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => 'partner/dashboard',
    ];

    /**
     * @param $id
     * @return array
     */
    public function notifyVehicleAdded($id)
    {
        return  [
            'greeting' => 'A New Vehicle Successfully Added on Hathaway-Limousines',
            'subject' => 'New Vehicle is Added By a Partner.',
            'body'   => 'A New Vehicle Added on Hathaway-Limousines Please check the Details of vehicle by visiting the web site',
            'thanks_text' => 'Hathaway Limousine Site',
            'action_text' => 'View My Site',
            'action_url' => 'admin/vehicle/vehicleDetail/' . $id,
        ];
    }

    protected $notifyDriverMsg = [
        'greeting' => 'A New Partner On Hathaway Limousines Added You As Driver',
        'subject' => 'New Partner Added You As Driver',
        'body'   => 'A New Partner On Hathaway Limousines Added You As Driver For More Details visit web',
        'thanks_text' => 'Thanks For Using Hathaway Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/driver/dashboard'
    ];
    protected $notifyDocumentMsg = [
        'greeting' => 'A New Partner On Hathaway Limousines Added Document',
        'subject' => 'New Partner Added Document',
        'body'   => 'A New Partner On Hathaway Limousines Added Document For More Details visit web',
        'thanks_text' => 'Thanks For Using Hathaway Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/admin/index'
    ];
    protected $adminnotifyDriverMsg = [
        'greeting' => 'A New Partner On Hathaway Limousines Added ',
        'subject' => 'New Driver is Added by Partner',
        'body'   => 'A New Partner On Hathaway Limousines is Added For More Details visit web',
        'thanks_text' => 'Thanks For Using Hathaway Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/driver/dashboard'
    ];
}
