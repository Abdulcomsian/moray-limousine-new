<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    public function index(){
        $data['vehicleType'] = VehicleType::all();
        return view('admin.vehicleType.list',$data);
    }

    public function add(){
        return view('admin.vehicleType.add');
    }

    public function save(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,bmp,png|max:2000'
        ]);

        $vehicleType = new VehicleType();
        $vehicleType->name = $request->input('name');
        $vehicleType->picture = '';
        $vehicleType->save();
        $picture = $request->file('picture');
        $vehicleType->picture = $picture->getClientOriginalName();
        $vehicleType->update();
        $picture->move(public_path().'/files/vehicleType/type_'.$vehicleType->id.'/',$vehicleType->picture);
        return redirect(url('admin/vehicleType'))->with('status','Vehicle Type has been added');
    }

    public function edit($id){
        $data['vehicleType'] = VehicleType::findOrFail($id);
        return view('admin.vehicleType.edit',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            'id' => 'required|integer',
            'name' => 'required|string',
            'picture' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);
        $vehicleType = VehicleType::findOrFail($request->input('id'));
        $vehicleType->name = $request->input('name');
        if($request->file('picture')){
            $picture = $request->file('picture');
            $vehicleType->picture = $picture->getClientOriginalName();
            $picture->move(public_path().'/files/vehicleType/type_'.$vehicleType->id.'/',$vehicleType->picture);
        }
        $vehicleType->update();
        return redirect(url('admin/vehicleType'))->with('status','Vehicle Type has been updated.');
    }

    public function delete($id){
        $vehicleType = VehicleType::findOrFail($id);
        // Check is there vehicle exists against this vehicleType
        $vehicleCount = Vehicle::where('type_id',$id)->get()->count();
        if($vehicleCount > 0){
            return redirect(url('admin/vehicleType'))->with('error','Vehicle Type is in use you cannot delete it');
        }
        $vehicleType->delete();
        return redirect(url('admin/vehicleType'))->with('status','Vehicle Type has been deleted');
    }
}
