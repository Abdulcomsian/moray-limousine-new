<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VehiclePricing;
use App\Models\PricingByDistance;
use Illuminate\Support\Facades\Auth;

class PricingByDistanceController extends Controller
{
    public function index(){
        $data['pricingByDistance'] = PricingByDistance::all();
        return view('admin.pricingByDistance.list',$data);
    }

    public function add(){
        return view('admin.pricingByDistance.add');
    }

    public function save(Request $request){
        $this->validate($request,[
            'from' => 'required|integer',
            'to' => 'required|integer',
            'price' => 'required|integer'
        ]);

        $pricingByDistance = new PricingByDistance();
        $pricingByDistance->from = $request->input('from');
        $pricingByDistance->to = $request->input('to');
        $pricingByDistance->price = $request->input('price');
        $pricingByDistance->created_by = Auth::user()->id;
        $pricingByDistance->save();
        return redirect(url('admin/pricingByDistance'))->with('status','Pricing By Distance has been added');
    }

    public function edit($id){
        $data['pricingByDistance'] = PricingByDistance::findOrFail($id);
        return view('admin.pricingByDistance.edit',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            'id' => 'required|integer',
            'from' => 'required|integer',
            'to' => 'required|integer',
            'price' => 'required|integer'
        ]);
        $pricingByDistance = PricingByDistance::findOrFail($request->input('id'));
        $pricingByDistance->from = $request->input('from');
        $pricingByDistance->to = $request->input('to');
        $pricingByDistance->price = $request->input('price');
        $pricingByDistance->update();
        return redirect(url('admin/pricingByDistance'))->with('status','Pricing By Distance has been updated.');
    }

    public function delete($id){
        $pricingByDistance = PricingByDistance::findOrFail($id);
        // Check is there vehicle exists against this pricingByDistance
        $vehicleCount = VehiclePricing::where('pricing_id',$id)->where('pricing_type','DISTANCE')->get()->count();
        if($vehicleCount > 0){
            return redirect(url('admin/pricingByDistance'))->with('error','Pricing By Distance is in use you cannot delete it');
        }
        $pricingByDistance->delete();
        return redirect(url('admin/pricingByDistance'))->with('status','Pricing By Distance has been deleted');
    }
}
