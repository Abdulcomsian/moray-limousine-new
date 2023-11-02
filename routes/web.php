<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//sites home pages roots
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\Admin\booking;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VehicleTypeController;
use App\Http\Controllers\Admin\VehicleMakeController;
use App\Http\Controllers\Admin\VehicleModelController;
use App\Http\Controllers\Admin\VehicleCategoryController;
use App\Http\Controllers\Admin\PricingByLocationController;
use App\Http\Controllers\Admin\PricingByDistanceController;
use App\Http\Controllers\Admin\VehiclePricingController;
use App\Http\Controllers\VehicleSubtypeController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\UploadedDocumentController;
use App\Http\Controllers\LocationController;



use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleSubtype;
use GuzzleHttp\Psr7\Request;

Auth::routes();

//work for cron job here

Route::get('send/expiry/notify', [HomeController::class, 'send_expiry_date_notify'])->name('send.expiry.notify');
Route::get('register/verify', [RegisterController::class, 'verify'])->name('verifyEmailLink');
Route::get('register/verify/resend', [RegisterController::class, 'showResendVerificationEmailForm'])->name('showResendVerificationEmailForm');
Route::post('register/verify/resend', [RegisterController::class, 'resendVerificationEmail'])->name('resendVerificationEmail');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home/getLocations', [BookingController::class, 'getAllowedCities']);
Route::get('/home/getLocationsbookinghours', [BookingController::class, 'getLocationHours']);
Route::get('/booking-by-hours', [BookingController::class, 'selectClassByHour'])->name('select.booking.by.hour');
Route::get('/ariport-transfer', [HomeController::class, 'ariporttransfer']);
Route::get('/limousine-service', [HomeController::class, 'limousineservice']);
Route::get('home/free-waiting-time', [HomeController::class, 'freewaitingtime']);
Route::get('/our-feet', [HomeController::class, 'ourfeet']);
Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/contact-us', [HomeController::class, 'contactUs']);
Route::get('/services-rates', [HomeController::class, 'servicesrates']);
Route::get('/our-services', [HomeController::class, 'ourServices']);
Route::get('service/details/{id}', [HomeController::class, 'serviceDetail']);
Route::get('/become-partner', [PartnerController::class, 'becomePartner']);

//new work for partner registration

Route::get('/partner-registration', function ()
{
    $locations = DB::table('locations')->get();
    return view('home.partner-registration', compact('locations'));
});

Route::get('check-email', [PartnerController::class, 'check_email']);
Route::get('/get-city-vehicle', [PartnerController::class, 'get_city_vehicle'])->name('get-city-vehicle');
Route::get('/get-city-document', [PartnerController::class, 'get_city_document'])->name('get-city-document');
Route::get('/get-city-legal-form', [PartnerController::class, 'get_city_legal_form'])->name('get-city-legal-form');
Route::get('/become-driver', [DriverController::class, 'becomeDriver'])->name('driver.becomeDriver');
Route::get('/Faq', [HomeController::class, 'faq']);
Route::get('/mpressum', [HomeController::class, 'footerPageOne']);
Route::get('/datenschutz', [HomeController::class, 'footerPageTwo']);
Route::get('/booking', [BookingController::class, 'selectClassByDistance'])->name('get.booking');



Route::group(['middleware' => ['web', 'auth']], function ()
{
    Route::get('user/invoice/{id}', [UserController::class, 'getInvoice']);


    Route::get('/checknotify', [BookingController::class, 'sendnotify']);

    Route::get('/booking/extra-options/{id}', [BookingController::class, 'selectOptions']);

    Route::get('/booking/selebooking-detailscted-class/{id}', [BookingController::class, 'selectedClass']);

    Route::get('/booking/extra-options-details', [BookingController::class, 'extraOptionsDetails'])->name('extra.option.details');

    // Route::get('/booking/booking-details-user', [BookingController::class, 'bookingDetailsUser'])->name('booking.details.user');

    Route::get('/booking/payment-form', [BookingController::class, 'bookingPayment'])->name('booking.payment');

    Route::post('/booking/store-booking', [BookingController::class, 'storeBooking'])->name('submit.booking');


    Route::get('/booking/approve/{id}', [BookingController::class, 'bookingApprove']);

    Route::post('/booking/adminapprove', [BookingController::class, 'adminbookingApprove']);

    Route::post('/booking/editadminapprove', [BookingController::class, 'editadminbookingApprove']);

    Route::get('/booking/disapprove/{id}', [BookingController::class, 'bookingDisapprove']);

    Route::post('paypal-transaction-complete', [BookingController::class, 'paypaltransactioncomplete']);

    Route::get('booking/thanks-page/{id?}', [BookingController::class, 'thanksPage'])->name('thanks.page');

    Route::get('/booking/driver/action/{booking_id}/{status}', [BookingController::class, 'driverAction'])->name('booking.driverAction');

    Route::get('/booking/driver/complete-booking/{booking_id}', [BookingController::class, 'completeBooking'])->name('booking.completeBooking');

    Route::get('/booking/booking-details', [BookingController::class, 'saveBookingOnSelect'])->name('booking.details');

    Route::get('/booking/details/{id}', [BookingController::class, 'bookingDetailsPage']);

    Route::get('/booking/complete/{id}', [BookingController::class, 'completeBooking']);

    Route::get('/booking/delete/{id}', [BookingController::class, 'bookingDelete']);

    Route::group(['middleware' => 'end_user'], function ()
    {
        Route::get('user/build-profile', [UserController::class, 'buildProfile'])->name('build-user-profile');

        Route::post('user/store-profile', [UserController::class, 'storeProfile'])->name('store-profile');

        Route::get('user/update-profile/{id}', [UserController::class, 'updateProfile'])->name('update-user-profile');

        Route::get('user/update-profile/{id}', [UserController::class, 'updateProfile'])->name('update-user-profile');

        Route::get('user/dashboard', [UserController::class, 'userReservation'])->name('user.dashboard');

        Route::get('user/profile', [UserController::class, 'userProfile'])->name('user.profile');

        Route::get('user/reservation', [UserController::class, 'userReservation'])->name('user.reservation');

        Route::get('user/cancel-booking/{id}', [UserController::class, 'cancelBooking']);

        Route::get('user/extend-booking/{id}', [UserController::class, 'extendBooking']);

        Route::get('user/completed-bookings', [UserController::class, 'completedBookings']);

        Route::get('user/canceled-bookings', [UserController::class, 'canceledBookings']);

        Route::get('user/all-bookings', [UserController::class, 'allBookings']);

        Route::get('user/filter-by-date', [UserController::class, 'filterByDate']);

        Route::get('user/filter-by-status', [UserController::class, 'filterByStatus']);

        Route::get('user/booking-details/{id}', [UserController::class, 'bookingDetail']);

        Route::get('user/booking-confirm/{id}', [UserController::class, 'bookingConfirm']);

        Route::get('user/notifications', [UserController::class, 'userNotifications']);

        Route::get('booking/checkout/{id?}', [BookingController::class, 'thanksHome'])->name('thankshome');

        Route::post('user/booking-extend', [UserController::class, 'saveExtendBooking'])->name('extend_booking');

        Route::post('user/paypal-transaction-complete', [UserController::class, 'paypaltransactioncomplete']);

        Route::get('user/change-password-form', [UserController::class, 'changePasswordForm']);

        Route::post('user/change-password', [UserController::class, 'changePassword'])->name('user.change.password');
    });


    Route::get('admin/get-categories-title/{id}', [VehicleSubtypeController::class, 'getSubCategories']);


    Route::post('/booking/assign', [BookingController::class , 'assignBooking'])->name('assignBooking');

    Route::get('/booking/un-assign/{id}', [BookingController::class, 'unAssignBooking'])->name('unAssignBooking');

    Route::get('/booking-assign-to-form', [BookingController::class, 'assignToForm'])->name('booking.assignToForm');

    Route::get('/admin/get-all-bookings', [BookingController::class, 'allBookings']);

    Route::get('/admin/get-pending-bookings', [BookingController::class, 'pendingBookings']);

    Route::get('/admin/get-neww-bookings', [BookingController::class, 'newBookings']);

    Route::get('/admin/get-assigned-bookings', [BookingController::class , 'assignedBookings']);

    Route::get('/admin/get-canceled-bookings', [BookingController::class, 'canceledBookings']);

    Route::get('/admin/get-completed-bookings', [BookingController::class, 'completedBookings']);

    Route::get('/admin/get-approved-bookings', [BookingController::class, 'approvedBookings']);

    Route::get('/admin/get-paid-bookings', [BookingController::class, 'paidBookings']);

    Route::get('/admin/booking_by_id/{id}', [BookingController::class, 'searchedIdBooking']);

    Route::get('/admin/booking_by_date', [BookingController::class, 'searchBookingByDate']);

    Route::get('/admin/services-cms', [CMSController::class, 'addServices']);

    Route::get('/admin/services-list', [CMSController::class, 'servicesList'])->name('service.list');

    Route::post('/admin/store-services', [CMSController::class, 'storeServices'])->name('store.services');

    Route::get('/admin/service-edit/{id}', [CMSController::class, 'editService']);

    Route::get('/admin/service-delete/{id}', [CMSController::class, 'deleteService']);

    Route::post('/admin/update-services', [CMSController::class, 'updateService'])->name('update.services');

    //        CMS home page

    Route::get('admin/manage-home-page', [CMSController::class, 'manageHomePage'])->name('manageHomePage');

    Route::post('admin/update-home-pageCMS', [CMSController::class , 'updateHomePageCMS'])->name('updateHomePageCMS');


    Route::get('/admin/faq-cms', [CMSController::class, 'addFaqs']);

    Route::get('/admin/faq-list', [CMSController::class, 'faqsList'])->name('faq.list');

    Route::get('/admin/faq-edit/{id}', [CMSController::class, 'editFaq']);

    Route::get('/admin/faq-delete/{id}', [CMSController::class, 'deleteFaq']);

    Route::post('/admin/store-faq', [CMSController::class, 'storeFaq'])->name('store.faq');

    Route::post('/admin/update-faq', [CMSController::class, 'updateFaq'])->name('update.faq');

    Route::get('user/logout-user', [HomeController::class, 'userLogout']);


    // contact us from clients messages

    Route::post('home/contact-us-store', [HomeController::class, 'contact_us_store'])->name('contact.us');

    //Booking roots

    Route::get('admin/booking', [booking::class, 'index']);

    Route::get('admin/booking-options', [booking::class, 'bookingoptions']);

    Route::get('admin/booking-login', [booking::class, 'bookinglogin']);

    Route::get('admin/booking-creaditcard', [booking::class, 'bookingcreaditcard']);

    Route::get('admin/booking-checkout', [booking::class, 'bookingcheckout']);

    // Admin Routes

    Route::group(['middleware' => 'auth'], function ()
    {

        Route::get('vehicle/vehicleDetail/{id}', [VehicleController::class, 'vehicleDetails']);

        Route::get('admin/approveVehicle/{id}', [VehicleController::class, 'approveVehicle']);

        Route::get('admin/disapproveVehicle/{id}', [VehicleController::class, 'disapproveVehicle']);

        Route::get('admin/deleteVehicle/{id}', [VehicleController::class, 'deleteVehicle']);

        Route::get('vehicle/all-vehicles', [VehicleController::class, 'allVehicles']);

        Route::get('vehicle/pending-vehicles', [VehicleController::class, 'pendingVehicles']);

        Route::get('vehicle/approved-vehicles', [VehicleController::class, 'approvedVehicles']);

        Route::get('vehicle/disapproved-vehicles', [VehicleController::class, 'disapprovedVehicles']);

        Route::get('vehicle/blocked-vehicles', [VehicleController::class, 'blockedVehicles']);


        Route::post('vehicle/save-documents', [VehicleController::class, 'storeDocuments'])->name('vehicle.store.docs');

        Route::get('vehicle/manage-documents', [VehicleController::class, 'manageDocs'])->name('vehicle.manage.docs');

        Route::get('vehicle/delete-docs/{id}', [VehicleController::class, 'deleteDocument']);

        Route::group(['middleware' => 'partner'], function ()
        {
            Route::get('partner/profile', [PartnerController::class, 'profileView'])->name('partner.profile');

            Route::get('partner/add-new-vehicle', [PartnerController::class, 'addNewVehicle']);

            Route::get('partner/update-vehicle/{id}', [PartnerController::class, 'updateVehicle']);

            Route::get('partner/vehicles-list', [PartnerController::class, 'vehiclesList'])->name('partner.vehicle.list');

            Route::post('partner/save-vehicle', [PartnerController::class, 'saveVehicle'])->name('partner.saveVehicle');

            Route::get('partner/profile', [PartnerController::class, 'profileView'])->name('partner.profile');

            Route::get('partner/dashboard', [PartnerController::class, 'partnerReservations']);

            Route::get('partner/reservations', [PartnerController::class, 'partnerReservations']);

            Route::get('partner/completed-bookings', [PartnerController::class, 'partnerCompletedBookings']);

            Route::get('partner/canceled-bookings', [PartnerController::class, 'partnerCanceledBookings']);

            Route::get('partner/pending-bookings', [PartnerController::class, 'partnerPendingBookings']);

            Route::get('partner/all-bookings', [PartnerController::class, 'partnerAllBookings']);

            Route::get('partner/bookings-by-date', [PartnerController::class, 'bookingsByDate']);

            Route::get('partner/build-profile', [PartnerController::class, 'buildProfile']);

            Route::get('partner/notifications', [PartnerController::class, 'partnerNotifications']);

            Route::get('partner/add-new-driver', [PartnerController::class, 'addNewDriver'])->name('partner.driver.list');

            Route::get('partner/approve-driver', [PartnerController::class, 'approveDriver']);

            Route::get('partner/disapprove-driver', [PartnerController::class, 'disapproveDriver']);

            Route::get('partner/driver-details/{id}', [PartnerController::class, 'driverDetails']);

            Route::get('partner/block-driver', [PartnerController::class, 'blockDriver']);

            Route::post('partner/save-new-driver', [PartnerController::class, 'saveNewDriver'])->name('partner.save.driver');

            Route::post('partner/store-profile', [PartnerController::class, 'storePartner'])->name('store-partner');

            Route::get('partner/update-profile/{id}', [PartnerController::class, 'pdateProfile'])->name('update-partner-profile');

            Route::post('partner/change-password', [PartnerController::class, 'changePassword'])->name('partner.change.password');

            Route::get('partner/change-password-form', [PartnerController::class, 'changePasswordForm'])->name('partner.edit.password');

            Route::get('partner/manage-documents', [PartnerController::class, 'uploadDocuments']);

            Route::post('partner/store-documents', [PartnerController::class, 'storeDocuments'])->name('store.documents');

            Route::get('partner/delete-document/{id}', [PartnerController::class, 'deleteDocument']);

            Route::get('partner/search-driver', [PartnerController::class, 'addDriver']);

            Route::get('partner/add-new-driver/{id}', [PartnerController::class, 'addNewDriverByEmail']);

            Route::post('partner/store-vehicle-docs', [PartnerController::class, 'storeVehicleDocs'])->name('partner.vehicle.docs');
        });

        Route::group(['middleware' => 'partnerstep'], function ()
        {
            Route::get('info/welcome', function ()
            {
                return view('information.welcome');
            });
            Route::get('info/company', function ()
            {
                $cities = DB::table('locations')->get();
                $coutnrycode = DB::table('country')->groupBy('phonecode')->orderBy('phonecode', 'asc')->get();
                $countries = DB::table('country')->get();
                $legalform = DB::table('legal_form_of_company')->get();
                return view('information.company', compact('cities', 'legalform', 'coutnrycode', 'countries'));
            });

            Route::get('info/driver', function ()
            {
                $driver = User::where(['user_type' => 'driver', 'creator_id' => Auth::user()->id])->first();
                $coutnrycode = DB::table('country')->groupBy('phonecode')->orderBy('phonecode', 'asc')->get();
                return view('information.driver', compact('driver', 'coutnrycode'));
            });

            Route::get('info/vehicle', function ()
            {
                $vehicle = Vehicle::where(['creator_id' => Auth::user()->id])->first();
                $data['category'] = VehicleCategory::all();
                $VehicleSubtype = VehicleSubtype::get();
                $proudctionyear = DB::table('year_production')->orderBy('production_year', 'asc')->get();
                $standards = DB::table('standard')->orderBy('standard', 'asc')->get();
                return view('information.vehicle', compact('vehicle', 'data', 'VehicleSubtype', 'standards', 'proudctionyear'));
            });

            Route::get('info/payment', function ()
            {
                return view('information.payment');
            });

            Route::get('info/thanku', [PartnerController::class, 'info_thanku'])->name('info-thanku');

            Route::post('info-basic-save', [PartnerController::class, 'info_basic_save'])->name('info-save-basic');

            Route::get('info/documents', [PartnerController::class, 'info_documents'])->name('info-documents');

            Route::get('info/session', [PartnerController::class, 'info_session'])->name('info-session');

            Route::get('info/upload', [PartnerController::class, 'info_upload'])->name('info-upload');

            Route::post('info/upload-document', [PartnerController::class, 'info_upload_document'])->name('info-upload-document');

            Route::post('/save-company', [PartnerController::class, 'save_company'])->name('save-company');

            Route::post('/save-driver', [PartnerController::class, 'save_driver'])->name('save-driver');

            Route::post('/save-vehicle', [PartnerController::class, 'save_vehicle'])->name('save-vehicle');

            Route::post('/save-payment', [PartnerController::class, 'save_payment'])->name('save-payment');
        });

        Route::group(['middleware' => 'driver'], function ()
        {

            Route::get('driver/login', 'AdminController@login')->name('driver.login');

            Route::get('driver/profile', [DriverController::class, 'driverProfile'])->name('driver.profile');

            Route::post('driver/build-profile/{id?}', [DriverController::class, 'storeDriverProfile'])->name('build-profile');

            Route::get('driver/profile-view', [DriverController::class, 'profileView'])->name('profile-view');

            Route::get('driver/update-profile/{id}', [DriverController::class, 'updateProfile'])->name('update-profile');

            Route::get('driver/dashboard', [DriverController::class, 'reservations'])->name('driver.dashboard');

            Route::get('driver/add-new-vehicle', [DriverController::class, 'addNewVehicle']);

            Route::post('driver/save-new-vehicle', [DriverController::class, 'saveNewVehicle'])->name('driver.saveVehicle');

            Route::get('driver/update-vehicle/{id}', [DriverController::class, 'updateVehicle']);

            Route::get('driver/vehicles-list', [DriverController::class, 'vehiclesList']);

            Route::get('driver/notifications', [DriverController::class, 'driverNotifications']);

            Route::get('driver/reservations', [DriverController::class, 'reservations'])->name('driver.reservations');

            Route::get('driver/reservation/detail/{id}', [DriverController::class, 'reservationDetail'])->name('driver.reservation.detail');

            Route::get('driver/upload-docs', [DriverController::class, 'uploadDocuments'])->name('driver.upload.documents');

            Route::post('driver/store-docs', [DriverController::class, 'storeDocuments'])->name('driver.store.documents');

            Route::get('driver/delete-docs/{id}', [DriverController::class, 'deleteDocument']);

            Route::post('driver/manage-docs', [DriverController::class, 'storeVehicleDocs'])->name('driver.vehicle.docs');

            Route::get('driver/change-password-form', [DriverController::class, 'changePasswordForm']);

            Route::post('driver/change-password', [DriverController::class, 'changePassword'])->name('driver.change.password');

            Route::get('driver/my-partners', [DriverController::class, 'myPartners']);
        });
    });

    // booking

    Route::group(['middleware' => 'admin'], function ()
    {

        Route::get('driver/pending-drivers', [DriverController::class, 'pendingDrivers']);

        Route::get('driver/approved-drivers', [DriverController::class, 'approvedDrivers']);

        Route::get('driver/disapproved-drivers', [DriverController::class, 'disapprovedDrivers']);

        Route::get('driver/blocked-drivers', [DriverController::class,'blockedDrivers']);

        Route::get('driver/all-drivers', [DriverController::class, 'allDrivers']);

        Route::get('/booking/pay-out/{id}', [AdminController::class, 'payOut']);

        Route::get('admin/home', [AdminController::class, 'home'])->name('admin.home');

        // Vehicle Type

        Route::get('admin/vehicleType', [VehicleTypeController::class, 'index'])->name('admin.vehicleType');

        Route::get('admin/vehicleType/add', [VehicleTypeController::class,'add'])->name('admin.vehicleType.add');

        Route::post('admin/vehicleType/save', [VehicleTypeController::class, 'save'])->name('admin.vehicleType.save');

        Route::get('admin/vehicleType/edit/{id}', [VehicleTypeController::class, 'edit'])->name('admin.vehicleType.edit');

        Route::post('admin/vehicleType/update', [VehicleTypeController::class, 'update'])->name('admin.vehicleType.update');

        Route::get('admin/vehicleType/delete/{id}', [VehicleTypeController::class, 'delete'])->name('admin.vehicleType.delete');

        // Vehicle Make

        Route::get('admin/vehicleMake', [VehicleMakeController::class, 'index'])->name('admin.vehicleMake');

        Route::get('admin/vehicleMake/add', [VehicleMakeController::class, 'add'])->name('admin.vehicleMake.add');

        Route::post('admin/vehicleMake/save', [VehicleMakeController::class, 'save'])->name('admin.vehicleMake.save');

        Route::get('admin/vehicleMake/edit/{id}', [VehicleMakeController::class, 'edit'])->name('admin.vehicleMake.edit');

        Route::post('admin/vehicleMake/update', [VehicleMakeController::class, 'update'])->name('admin.vehicleMake.update');

        Route::get('admin/vehicleMake/delete/{id}', [VehicleMakeController::class, 'delete'])->name('admin.vehicleMake.delete');

        // Vehicle Model

        Route::get('admin/vehicleModel', [VehicleModelController::class, 'index'])->name('admin.vehicleModel');

        Route::get('admin/vehicleModel/add', [VehicleModelController::class, 'add'])->name('admin.vehicleModel.add');

        Route::post('admin/vehicleModel/save', [VehicleModelController::class, 'save'])->name('admin.vehicleModel.save');

        Route::get('admin/vehicleModel/edit/{id}', [VehicleModelController::class, 'edit'])->name('admin.vehicleModel.edit');

        Route::post('admin/vehicleModel/update', [VehicleModelController::class, 'update'])->name('admin.vehicleModel.update');

        Route::get('admin/vehicleModel/delete/{id}',  [VehicleModelController::class, 'delete'])->name('admin.vehicleModel.delete');

        // Vehicle Category

        Route::get('admin/vehicleCategory', [VehicleCategoryController::class, 'index'])->name('admin.vehicleCategory');

        Route::get('admin/add-category', [VehicleCategoryController::class, 'addCategory'])->name('add.category');

        Route::post('admin/save-new-category', [VehicleCategoryController::class, 'saveNewCategory'])->name('save.category');

        Route::get('admin/delete-category/{id}', [VehicleCategoryController::class, 'categoryDelete']);

        Route::get('admin/vehicleCategory/add', [VehicleCategoryController::class, 'add'])->name('admin.vehicleCategory.add');

        Route::post('admin/vehicleCategory/save', [VehicleCategoryController::class, 'save'])->name('admin.vehicleCategory.save');

        Route::get('admin/vehicleCategory/edit/{id}', [ehicleCategoryController::class, 'edit'])->name('admin.vehicleCategory.edit');

        Route::post('admin/vehicleCategory/update', [VehicleCategoryController::class, 'update'])->name('admin.vehicleCategory.update');

        Route::get('admin/vehicleCategory/delete/{id}', [VehicleCategoryController::class, 'delete'])->name('admin.vehicleCategory.delete');

        Route::get('admin/vehicleCategory/update/{id}', [VehicleCategoryController::class, 'updateCategory']);

        // Pricing By Location

        Route::get('admin/pricingByLocation', [PricingByLocationController::class, 'index'])->name('admin.pricingByLocation');

        Route::get('admin/pricingByLocation/add', [PricingByLocationController::class, 'add'])->name('admin.pricingByLocation.add');

        Route::post('admin/pricingByLocation/save', [PricingByLocationController::class, 'save'])->name('admin.pricingByLocation.save');

        Route::get('admin/pricingByLocation/edit/{id}', [PricingByLocationController::class, 'edit'])->name('admin.pricingByLocation.edit');

        Route::post('admin/pricingByLocation/update', [PricingByLocationController::class, 'update'])->name('admin.pricingByLocation.update');

        Route::get('admin/pricingByLocation/delete/{id}', [PricingByLocationController::class, 'delete'])->name('admin.pricingByLocation.delete');

        // Pricing By Distance

        Route::get('admin/pricingByDistance', [PricingByDistanceController::class, 'index'])->name('admin.pricingByDistance');

        Route::get('admin/pricingByDistance/add', [PricingByDistanceController::class, 'add'])->name('admin.pricingByDistance.add');

        Route::post('admin/pricingByDistance/save', [PricingByDistanceController::class, 'save'])->name('admin.pricingByDistance.save');

        Route::get('admin/pricingByDistance/edit/{id}', [PricingByDistanceController::class, 'edit'])->name('admin.pricingByDistance.edit');

        Route::post('admin/pricingByDistance/update', [PricingByDistanceController::class, 'update'])->name('admin.pricingByDistance.update');

        Route::get('admin/pricingByDistance/delete/{id}', [PricingByDistanceController::class, 'delete'])->name('admin.pricingByDistance.delete');

        // Vehicle Pricing

        Route::get('admin/vehiclePricing', [VehiclePricingController::class, 'index'])->name('admin.vehiclePricing');

        Route::get('admin/vehiclePricing/add/{id}', [VehiclePricingController::class, 'addPricing'])->name('admin.vehiclePricing.add');

        Route::post('admin/vehiclePricing/save', [VehiclePricingController::class, 'savePricing'])->name('admin.vehiclePricing.save');

        Route::get('admin/vehiclePricing/edit/{id}', [VehiclePricingController::class, 'editPricing'])->name('admin.vehiclePricing.edit');

        Route::get('admin/vehiclePricing/detail/{id}', [VehiclePricingController::class, 'detailPricing'])->name('admin.vehiclePricing.detail');

        Route::post('admin/vehiclePricing/update', [VehiclePricingController::class, 'update'])->name('admin.vehiclePricing.update');

        Route::get('admin/vehiclePricing/delete/{id}', [VehiclePricingController::class, 'delete'])->name('admin.vehiclePricing.delete');

        Route::get('admin/vehiclePricing/details/{id}', [VehiclePricingController::class, 'pricingDetails']);

        Route::get('admin/vehiclePricing/price-fields', [VehiclePricingController::class, 'priceFields'])->name('admin.vehiclePricing.priceFields');


        //vehicle subtype

        Route::get('admin/vehicle-subtype/list', [VehicleSubtypeController::class, 'list'])->name('admin.vehicleSubtype.list');

        Route::post('admin/vehicle-subtype/add', [VehicleSubtypeController::class, 'add'])->name('admin.vehicleSubtype.add');

        Route::get('admin/vehicle-subtype/delete/{id}', [VehicleSubtypeController::class, 'delete'])->name('admin.vehicleSubtype.delete');

        Route::post('admin/vehicle-subtype/edit/{id}', [VehicleSubtypeController::class, 'edit'])->name('admin.vehicleSubtype.edit');



        // Vehicle Listing

        Route::get('admin/add-vehicle', [VehicleController::class, 'addVehicle']);

        Route::get('admin/vehicle-list', [VehicleController::class, 'vehicleList']);

        Route::get('admin/production-list', [VehicleController::class, 'productionList']);

        Route::post('admin/production-save', [VehicleController::class, 'productionSave']);

        Route::post('admin/update-production-year', [VehicleController::class, 'productionUpdate']);

        Route::post('admin/production-delete', [VehicleController::class, 'productionDelete']);

        //standard route

        Route::post('admin/standard-save', [VehicleController::class, 'standardSave']);

        Route::post('admin/update-standard', [VehicleController::class, 'standardUpdate']);

        Route::post('admin/standard-delete', [VehicleController::class, 'standardDelete']);


        //work for label

        Route::post('admin/label-save', [VehicleController::class, 'labelSave']);

        Route::post('admin/update-label', [VehicleController::class, 'labelUpdate']);

        Route::post('admin/vehicle-save', [VehicleController::class, 'saveVehicle'])->name('vehicle.save');

        Route::get('admin/editVehicle/{id}', [VehicleController::class, 'editVehicle']);

        Route::post('admin/updateVehicle', [VehicleController::class, 'update']);

        Route::get('admin/update-vehicle/{id}', [VehicleController::class, 'updateVehicle']);

        Route::get('admin/home', [AdminController::class, 'home'])->name('admin.home');

        Route::post('admin/send-email', [AdminController::class, 'sendEmailToUser'])->name('admin.send.notification');

        Route::post('admin/drivers-notify', [AdminController::class, 'notifyDriver'])->name('driver.send.notification');

        Route::get('admin/all-driver-list', [AdminController::class, 'allDriverList']);

        Route::get('admin/admin-drivers-list', [AdminController::class, 'adminDrivers']);

        Route::get('admin/drivers-list', [AdminController::class, 'registeredDrivers']);

        Route::get('admin/change-status', [AdminController::class, 'changeStatus']);

        Route::get('admin/disapprove-status', [AdminController::class, 'disapproveStatus']);

        Route::get('admin/block-status', [AdminController::class, 'blockStatus']);

        Route::post('admin/register-driver', [AdminController::class, 'registerDriver'])->name('admin.registerDriver');

        Route::post('admin/register-partner', [AdminController::class, 'registerPartner'])->name('admin.registerPartner');

        Route::get('admin/menage-drivers', [AdminController::class, 'menageDrivers'])->name('drivers.list');

        Route::get('admin/menage-partners', [AdminController::class, 'partnersList'])->name('partners.list');

        Route::get('admin/partner-details/{id}', [UserController::class, 'PartnerDetails']);

        Route::get('admin/approve-partner/{id}', [AdminController::class, 'approvePartner']);

        Route::get('admin/disapprove-partner/{id}', [AdminController::class, 'disapprovePartner']);


        Route::get('admin/delete-partner/{id}', [AdminController::class, 'deletePartner']);

        Route::get('admin/block-partner/{id}', [AdminController::class, 'blockPartner']);

        Route::get('admin/driver-details/{id}', [AdminController::class, 'driverDetails'])->name('admin.driverDetail');

        Route::get('admin/manage-bookings',  [AdminController::class, 'manageBookings'])->name('manage.bookings');

        // Route::get('admin/payout-bookings', [BookingController::class, 'payOutBookings'])->name('manage.bookings');

        Route::get('admin/index',  [AdminController::class, 'manageBookings'])->name('admin.index');

        Route::get('admin/notifications', [AdminController::class, 'adminNotifications'])->name('admin.notifications');

        Route::get('admin/vehicle/vehicleDetail/{id}', [AdminController::class, 'vehicleDetails']);

        Route::get('admin/manage-discount',  [AdminController::class, 'manageDiscounts'])->name('discount.list');

        Route::post('admin/save-discount', [DiscountController::class, 'saveDiscount'])->name('save.discount');

        Route::get('admin/edit-discount/{id}', [DiscountController::class, 'editDiscount']);

        Route::get('admin/discount-disactive/{id}', [DiscountController::class, 'discountDisActive']);

        Route::get('admin/discount-active/{id}', [DiscountController::class, 'discountActive']);

        Route::get('admin/discount-delete/{id}', [DiscountController::class, 'discountDelete']);

        //city wise percentage

        Route::get('admin/manage-city-pricing',  [AdminController::class, 'manageCityPricing'])->name('manage-city-pricing');

        Route::post('admin/save-manage-city-pricing',  [AdminController::class, 'saveCityPricing'])->name('admin.save.city.price');

        Route::get('admin/edit-city-price/{id}', [AdminController::class, 'editCityPricing']);

        Route::get('admin/delete-city-price/{id}',  [AdminController::class, 'deleteCityPrice']);

        Route::get('admin/city-price-disactive/{id}',  [AdminController::class, 'cityPriceDisActive']);

        Route::get('admin/city-price-active/{id}',  [AdminController::class, 'cityPriceActive']);



        //        Documents Routes
        Route::get('admin/add-documents', [DocumentsController::class, 'addDocuments']);

        Route::get('admin/document-delete/{id}', [DocumentsController::class, 'deleteDocument']);

        Route::get('admin/edit-document/{id}', [DocumentsController::class, 'editDocument']);

        Route::post('admin/save-documents', [DocumentsController::class, 'saveDocuments'])->name('admin.documents.save');

        Route::get('admin/approve-doc/{id}', [UploadedDocumentController::class, 'approveDocument']);

        Route::get('admin/disapprove-doc/{id}', [UploadedDocumentController::class, 'disapproveDocument']);

        //          Manage Locations Routes

        Route::get('admin/add-locations', [LocationController::class, 'addLocations']);
        Route::get('admin/add-booking-hours', [LocationController::class, 'addBookingHours']);
        Route::get('admin/delete-location/{id}', [LocationController::class, 'deleteLocation']);
        Route::get('admin/edit-location/{id}', [LocationController::class, 'editLocation']);
        Route::get('admin/make-top-city/{id}', [LocationController::class, 'makeTopCity']);
        Route::get('admin/remove-top-city/{id}', [LocationController::class, 'removeTopCity']);
        Route::post('admin/save-location', [LocationController::class, 'saveLocation'])->name('admin.save.location');
        Route::post('admin/save-booking-hours', [LocationController::class, 'saveBookingHours'])->name('admin.save.bookinghour');
        Route::get('admin/delete-booking-hour/{id}', [LocationController::class, 'deleteBookingHour']);
        Route::get('admin/edit-booking-hour/{id}', [LocationController::class, 'editBookinghour']);


        //        Manage tax

        Route::post('admin/change-tax', [AdminController::class, 'changeTax'])->name('changeTax');

        Route::get('admin/add-extra-options', [AdminController::class, 'addOptions'])->name('add.extra.options');
        Route::post('admin/save-option', [AdminController::class, 'saveOption'])->name('save.option');

        Route::get('admin/option/update/{id}', [AdminController::class, 'optionUpdate']);
        Route::get('admin/option/details/{id}', [AdminController::class, 'optionDetails']);
        Route::get('admin/option/delete/{id}', [AdminController::class, 'optionDelete']);

        Route::get('admin/happy-clients', [AdminController::class, 'happyClients']);
        Route::post('admin/create-clients', [AdminController::class, 'createClient'])->name('save.client');
        Route::get('admin/delete-client/{id}', [AdminController::class, 'deleteClient']);

        Route::get('admin/all-partners', [PartnerController::class, 'allPartners']);
        Route::get('admin/pending-partners', [PartnerController::class, 'pendingPartners']);
        Route::get('admin/approved-partners', [PartnerController::class, 'approvedPartners']);
        Route::get('admin/disapproved-partners', [PartnerController::class, 'disapprovedPartners']);
        Route::get('admin/blocked-partners', [PartnerController::class, 'blockedPartners']);
        Route::get('admin/search-partners', [PartnerController::class, 'searchByEmail']);

        Route::get('admin/web-configuration', [AdminController::class, 'configuration']);
        Route::post('admin/save-configuration', [AdminController::class, 'saveConfiguration'])->name('save.configuration');

        // inquiries

        Route::get('admin/inquiries', [AdminController::class, 'inquiries']);

        Route::get('admin/inquiries/detail/{id}', [AdminController::class, 'inquiryDetail']);

        Route::delete('admin/delete/inquiry/{id}', [AdminController::class, 'inquiryDelete'])->name('delete.inquiry');

        Route::get('admin/change-password', [AdminController::class, 'changePasswordForm'])->name('admin.change.password');

        Route::post('change-password', [AdminController::class, 'store'])->name('change.password');

        //partner registration requirements

        Route::get('/partner-registration-req', [AdminController::class, 'partner_req'])->name('partner-req');
        Route::post('/partner-reg-req-save', [AdminController::class, 'partner_req_save']);
        Route::post('/partner-reg-req-update', [AdminController::class, 'partner_req_update']);
        Route::post('/partner-reg-req-delete', [AdminController::class, 'partner_req_delete']);


        // Legal form of Company

        //partner registration requirements
        Route::get('/legal-form-of-company', [AdminController::class, 'legal_req'])->name('legal-form-of-company');
        Route::post('/legal-form-of-company-save', [AdminController::class, 'legal_req_save']);
        Route::post('/legal-form-of-company-update', [AdminController::class, 'legal_req_update']);
        Route::post('/legal-form-of-company-delete', [AdminController::class, 'legal_req_delete']);
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
