<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\BookingHour;
use DB;

class LocationController extends Controller
{

    private $location;
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addLocations(){
        $data['locations'] = Location::all();
        return view('admin.manage-locations.add-locations',$data);
    }

    public function addBookingHours()
    {
        $data['country'] = DB::table('country')->get();
        $data['countries']=BookingHour::where('country','!=','')->get();
        $data['city']=BookingHour::where('city','!=','')->get();
        return view('admin.manage-locations.add-booking-hours',$data);
    }

    public function saveBookingHours(Request $request)
    {   $edit_id = $request->edit_id;
        if($edit_id==null)
        {
            $model = new BookingHour(); 
        }
        else{
             $model = BookingHour::find($edit_id);
        }
       
        if(isset($request->country))
        {
            $model->country=$request->country;
        }elseif(isset($request->location_city))
        {
            $model->city=$request->location_city;
        }
        $model->hours=$request->hours;
        if($model->save())
        {
             return redirect('admin/add-booking-hours')->with('success','Success .. !  Record save Successfully .');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveLocation(Request $request){
        $edit_id = $request->edit_id;
        if ($edit_id == null){
            $location = Location::where('location_city',$request['location_city'])->get();
            if (count($location) > 0){
                return redirect('admin/add-locations')->with('error','Oops .. ! This City Already Added');

            }else{
                Location::create($request->all());
            }
        }else{
            Location::where('id',$edit_id)->update($request->except('_token','edit_id'));
        }

        return redirect('admin/add-locations')->with('success','Success .. !  City Location / City Saved Successfully .');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteLocation($id){
        $location = Location::find($id);
        $location->delete();
        return redirect('admin/add-locations');
    }

    public function deleteBookingHour($id)
    {
        BookingHour::find($id)->delete();
        return redirect('admin/add-booking-hours')->with('success','Success .. !  Record Deleted Successfully .');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editLocation($id){
        $location = Location::find($id);
        return response()->json($location);
    }

    public function editBookinghour($id)
    {
         $result=BookingHour::find($id);
         return response()->json($result);
    }

    public function makeTopCity($id){
        $location = $this->location->find($id);
        $location->is_top_city = true;
        $location->save();
        return redirect()->back();
    }

    public function removeTopCity($id){
        $location = $this->location->find($id);
        $location->is_top_city = false;
        $location->save();
        return redirect()->back();
    }

}
