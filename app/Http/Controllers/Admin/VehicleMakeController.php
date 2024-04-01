<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleMake;

class VehicleMakeController extends Controller
{
    public function index(){
        $data['vehicleMake'] = VehicleMake::all();
        return view('admin.vehicleMake.list',$data);
    }

    public function add(){
        return view('admin.vehicleMake.add');
    }

    public function save(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,bmp,png|max:2000'
        ]);

        $vehicleMake = new VehicleMake();
        $vehicleMake->name = $request->input('name');
        $vehicleMake->picture = '';
        $vehicleMake->save();
        $picture = $request->file('picture');
        $vehicleMake->picture = $picture->getClientOriginalName();
        $vehicleMake->update();
        $picture->move(public_path().'/files/vehicleMake/make_'.$vehicleMake->id.'/',$vehicleMake->picture);
        return redirect(url('admin/vehicleMake'))->with('status','Vehicle Make has been added');
    }

    public function edit($id){
        $data['vehicleMake'] = VehicleMake::findOrFail($id);
        return view('admin.vehicleMake.edit',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            'id' => 'required|integer',
            'name' => 'required|string',
            'picture' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);
        $vehicleMake = VehicleMake::findOrFail($request->input('id'));
        $vehicleMake->name = $request->input('name');
        if($request->file('picture')){
            $picture = $request->file('picture');
            $vehicleMake->picture = $picture->getClientOriginalName();
            $picture->move(public_path().'/files/vehicleMake/make_'.$vehicleMake->id.'/',$vehicleMake->picture);
        }
        $vehicleMake->update();
        return redirect(url('admin/vehicleMake'))->with('status','Vehicle Make has been updated.');
    }

    public function delete($id){
        $vehicleMake = VehicleMake::findOrFail($id);
        // Check is there vehicle exists against this vehicleMake
        $vehicleCount = Vehicle::where('make_id',$id)->get()->count();
        if($vehicleCount > 0){
            return redirect(url('admin/vehicleMake'))->with('error','Vehicle Make is in use you cannot delete it');
        }
        $vehicleMake->delete();
        return redirect(url('admin/vehicleMake'))->with('status','Vehicle Make has been deleted');
    }
}
