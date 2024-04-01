<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PricingByLocation;
use App\Models\VehiclePricing;
use Illuminate\Support\Facades\Auth;

class PricingByLocationController extends Controller
{
    public function index(){
        $data['pricingByLocation'] = PricingByLocation::all();
        return view('admin.pricingByLocation.list',$data);
    }

    public function add(){
        return view('admin.pricingByLocation.add');
    }

    public function save(Request $request){
        $this->validate($request,[
            'from' => 'required|string',
            'to' => 'required|string',
            'price' => 'required|integer',
        ]);

        $pricingByLocation = new PricingByLocation();
        $pricingByLocation->from = $request->input('from');
        $pricingByLocation->to = $request->input('to');
        $pricingByLocation->price = $request->input('price');
        $pricingByLocation->created_by = Auth::user()->id;
        $pricingByLocation->save();
        return redirect(url('admin/pricingByLocation'))->with('status','Pricing By Location has been added');
    }

    public function edit($id){
        $data['pricingByLocation'] = PricingByLocation::findOrFail($id);
        return view('admin.pricingByLocation.edit',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            'id' => 'required|integer',
            'from' => 'required|string',
            'to' => 'required|string',
            'price' => 'required|integer',
        ]);
        $pricingByLocation = PricingByLocation::findOrFail($request->input('id'));
        $pricingByLocation->from = $request->input('from');
        $pricingByLocation->to = $request->input('to');
        $pricingByLocation->price = $request->input('price');
        $pricingByLocation->update();
        return redirect(url('admin/pricingByLocation'))->with('status','Pricing By Location has been updated.');
    }

    public function delete($id){
        $pricingByLocation = PricingByLocation::findOrFail($id);
        // Check is there vehicle exists against this pricingByLocation
        $vehicleCount = VehiclePricing::where('pricing_id',$id)->where('pricing_type','LOCATION')->get()->count();
        if($vehicleCount > 0){
            return redirect(url('admin/pricingByLocation'))->with('error','Pricing By Location is in use you cannot delete it');
        }
        $pricingByLocation->delete();
        return redirect(url('admin/pricingByLocation'))->with('status','Pricing By Location has been deleted');
    }
}
