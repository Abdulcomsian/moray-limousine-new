<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleModel;

class VehicleModelController extends Controller
{
    public function index(){
        $data['vehicleModel'] = VehicleModel::all();
        return view('admin.vehicleModel.list',$data);
    }

    public function add(){
        return view('admin.vehicleModel.add');
    }

    public function save(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,bmp,png|max:2000'
        ]);

        $vehicleModel = new VehicleModel();
        $vehicleModel->name = $request->input('name');
        $vehicleModel->picture = '';
        $vehicleModel->save();
        $picture = $request->file('picture');
        $vehicleModel->picture = $picture->getClientOriginalName();
        $vehicleModel->update();
        $picture->move(public_path().'/files/vehicleModel/model_'.$vehicleModel->id.'/',$vehicleModel->picture);
        return redirect(url('admin/vehicleModel'))->with('status','Vehicle Model has been added');
    }

    public function edit($id){
        $data['vehicleModel'] = VehicleModel::findOrFail($id);
        return view('admin.vehicleModel.edit',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            'id' => 'required|integer',
            'name' => 'required|string',
            'picture' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);
        $vehicleModel = VehicleModel::findOrFail($request->input('id'));
        $vehicleModel->name = $request->input('name');
        if($request->file('picture')){
            $picture = $request->file('picture');
            $vehicleModel->picture = $picture->getClientOriginalName();
            $picture->move(public_path().'/files/vehicleModel/model_'.$vehicleModel->id.'/',$vehicleModel->picture);
        }
        $vehicleModel->update();
        return redirect(url('admin/vehicleModel'))->with('status','Vehicle Model has been updated.');
    }

    public function delete($id){
        $vehicleModel = VehicleModel::findOrFail($id);
        // Check is there vehicle exists against this vehicleModel
        $vehicleCount = Vehicle::where('model_id',$id)->get()->count();
        if($vehicleCount > 0){
            return redirect(url('admin/vehicleModel'))->with('error','Vehicle Model is in use you cannot delete it');
        }
        $vehicleModel->delete();
        return redirect(url('admin/vehicleModel'))->with('status','Vehicle Model has been deleted');
    }
}
