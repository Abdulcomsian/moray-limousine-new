<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CmsHomePage;
use App\Models\Document;
use App\Models\Location;
use App\Models\Driver;
use App\Rules\MatchOldPassword;
use App\Models\UploadedDocument;
use App\Models\User;
use App\Models\UsersMedia;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class DriverController extends Controller
{
    /**
     * @var Driver
     */
    private $driver;
    private $uploadedDocument;
    private $user;

    /**
     * DriverController constructor.
     * @param Driver $driver
     * @param UploadedDocument $uploadedDocument
     * @param User $user
     */
    public function __construct(Driver $driver, UploadedDocument $uploadedDocument, User $user)
    {
        $this->uploadedDocument = $uploadedDocument;
        $this->driver = $driver;
        $this->user = $user;
    }

    public $driverRules = [
        'date_of_birth' => 'required',
        'phone_number' => 'required|min:5|max:30',
        'address' => 'required|max:300',
        'vehicle_licence_no' => 'max:100',
        'vehicle_licence_expiry' => 'max:100',
        'pco_licence_no' => 'required|max:100',
        'pco_licence_expiry' => 'max:100',
        'permanent_address' => 'max:300',
        'default_location' => 'max:100',
        'gender' => 'required|max:10',
        'whats_app' => 'max:100'
    ];
    /**
     * @var array
     */
    protected $VehicleValidationRules = [
        'title' => 'required|max:50|string',
        'vehicleCategory_id' => 'required|integer',
        'engine_capacity' => 'required|string',
        'transmission' => 'required|string',
        'fuel_type' => 'required|string|max:20',
        'plate' => 'required|string|max:40',
        'model_no' => 'required|string|max:40',
    ];

    /** Save and update Vehicle data
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function storeDriverProfile(Request $request)
    {
        $this->validate($request, $this->driverRules);
        $id = null;
        $locations = $request->locations;
        $id = $request['id'];
        $media = new UsersMedia();
        $userImage = null;


        if ($request->hasFile('image_name')) {
            $userImage = time() . $request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('uploaded-user-images/endusers-images'), $userImage);
        }

        //        Update Driver Profile
        $formData = $request->except('locations');
        if ($id == null) {
            $this->driver->createDriverProfile($formData, $locations);
            if (isset($userImage)) {
                $media->saveUserImage($userImage, Auth()->id());
            }
        } else {
            $formData = $request->except(['_token', 'image', 'image_name', 'locations']);
            $this->driver->updateDriverProfile($formData, $id, $locations);
            if (isset($userImage)) {
                if (Auth()->user()->userMedia()->first()) {
                    $media->updateUserImage($userImage, Auth()->id());
                } else {
                    $media->saveUserImage($userImage, Auth()->id());
                }
            }
        }
        return redirect(route('driver.profile'));
    }

    /**
     * @return Factory|View
     */
    public function profileView()
    {
        $data['locations'] = Location::all();
        return view('driver.build-profile', $data);
    }

    /** Form View For Update Data
     * @param $id
     * @return Factory|View
     */
    public function updateProfile($id)
    {
        $data['locations'] = Location::all();
        return view('driver.build-profile', $data);
    }

    /**
     * @return Factory|View
     */
    public function driverProfile()
    {
        $documents = auth()->user()->uploadedDocuments;
        return view('driver.profile')->with('documents', $documents);
    }

    public function driverDashboard()
    {
        $driver = auth()->user();
        $data['bookings'] = $driver->booking()->get();
        $data['pending_bookings'] = $driver->booking->where('booking_status', 'pending');
        $data['canceled_bookings'] = $driver->booking->where('booking_status', 'canceled');
        $data['completed_bookings'] = $driver->booking->where('booking_status', 'completed');
        return view('driver.driver-dashboard', $data);
    }

    /**
     * @return Factory|View
     */
    public function becomeDriver()
    {
        $homeCMS = CmsHomePage::all();
        $home_content = [];
        foreach ($homeCMS as $home) {
            $item_name = $home->item_name;
            $home_content += [$item_name => $home->item_content];
        }
        $data['home_content'] = $home_content;
        return view('home.become-driver', $data);
    }


    /**
     * @return Factory|View
     *
     * Driver Partners List
     */
    public function myPartners()
    {
        $partners = auth()->user()->addedByUsers;
        return view('driver.my-partners')->with('partners', $partners);
    }


    /** Return view of add driver Form
     * @return Factory|View
     */
    public function addNewVehicle()
    {
        $data['category'] = VehicleCategory::all();
        $data['locations'] =  Location::all();
        return view('driver.add-new-vehicle', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveNewVehicle(Request $request)
    {

        $image = $request['image_name'];
        $id = $request->ID;
        $this->validate($request, $this->VehicleValidationRules);
        $formData = $request->all();

        //save Image to Directory
        if ($request->hasFile('image_name')) {
            $image = time() . $request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('admin-vehicle-img'), $image);
            $formData['image_name'] = $image;
        }
        if (isset($id)) {
            $formData = $request->except('_token');
            if ($image != null or '') {
                $formData['image_name'] = $image;
            }
            $this->driver->updateVehicle($formData, $id);
        } else {

            $this->driver->createNewVehicle($formData);
        }
        return redirect(url('driver/vehicles-list'))->with('status', 'Vehicle has been added');
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
        return view('driver.add-new-vehicle', $data);
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

    /** Return Vehicle Listings View
     * @return Factory|View
     */
    public function vehiclesList()
    {
        $data['vehicles'] = Vehicle::where('creator_id', Auth()->id())->get();
        return view('driver.driver-vehicles-list', $data);
    }

    /**
     * @return Factory|View
     */
    public function reservations()
    {
        $driver = auth()->user();
        $data['bookings'] = $driver->booking;
        $data['driver'] = $driver;
        $data['pending_bookings'] = $driver->booking->where('booking_status', 'pending');
        $data['canceled_bookings'] = $driver->booking->where('booking_status', 'canceled');
        $data['completed_bookings'] = $driver->booking->where('booking_status', 'completed');
        return view('driver.reservations', $data);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function reservationDetail($id)
    {
        $booking = Booking::find($id);
        return view('driver.reservation-detail', compact('booking'));
    }


    /**
     * @return Factory|View
     */
    public function driverNotifications()
    {
        $notifications = auth()->user()->notifications()->where('read_at', '!=', null)->get();
        return view('driver.driver-notifications')->with('notifications', $notifications);
    }



    /**
     * @return Factory|View
     */
    public function uploadDocuments()
    {
        $data['documents'] = Document::where('applied_on', 'driver')->get();
        $data['userDocuments'] = auth()->user()->uploadedDocuments;
        return view('driver.documents', $data);
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
                return redirect(route('driver.upload.documents'))->with('error', 'Error ! This Document ( ' . $documents_data['document_title'] . ' )  Already Exist You Can Edit It If you Want.');
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
        return redirect(route('driver.upload.documents'))->with('success', 'Success ! Document Is Saved Successfully');
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
        return redirect(route('driver.upload.documents'))->with('success', 'Document Is Deleted Successfully ');
    }
    public function allDrivers()
    {
        $drivers = $this->user->where('user_type', 'driver')->orderBy('id', 'desc')->get();
        return view('parshall-views._driver-list-table')->with('drivers', $drivers);
    }

    public function pendingDrivers()
    {
        $drivers = $this->user->where('user_type', 'driver')->where('status', 'pending')->orderBy('id', 'desc')->get();
        return view('parshall-views._driver-list-table')->with('drivers', $drivers);
    }
    public function approvedDrivers()
    {
        $drivers = $this->user->where('user_type', 'driver')
            ->where('status', 'approved')->orderBy('id', 'desc')->get();
        return view('parshall-views._driver-list-table')->with('drivers', $drivers);
    }
    public function disapprovedDrivers()
    {
        $drivers = $this->user->where('user_type', 'driver')->where('status', 'disapproved')->orderBy('id', 'desc')->get();
        return view('parshall-views._driver-list-table')->with('drivers', $drivers);
    }
    public function blockedDrivers()
    {
        $drivers = $this->user->where('user_type', 'driver')->where('status', 'blocked')->orderBy('id', 'desc')->get();
        return view('parshall-views._driver-list-table')->with('drivers', $drivers);
    }

    /**
     * @return Factory|View
     */
    public function changePasswordForm()
    {
        return view('driver.change-password');
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
            return redirect()->back()->with('success', 'Success ..! Password Is Changed Successfully !');
        }
    }

    protected $notifyDocumentMsg = [
        'greeting' => 'A New Driver On Moray Limousines Added Document',
        'subject' => 'New Driver Added Document',
        'body'   => 'A New Driver On Moray Limousines Added Document For More Details visit web',
        'thanks_text' => 'Thanks For Using Moray Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/admin/index'
    ];
}
