<?php

namespace App\Http\Controllers;

use App\Models\VehicleCategory;
use App\Models\VehicleSubtype;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleSubtypeController extends Controller
{
    //

    /**
     * @return Factory|View
     */
    public function list()
    {
        $vehicleSubtypes = VehicleSubtype::all();
        return view('admin.vehicleSubtype.list', compact('vehicleSubtypes'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function add(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'created_by' => 'required'
        ]);

        $subtype = VehicleSubtype::create($validatedData);
        if ($subtype){
            return redirect()->back()->with('success', 'New Model added successfully');
        }else{
            return redirect()->back()->with('error', 'There is error while adding Model');
        }
    }

    public function edit(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required',
            'created_by' => 'required'
        ]);
        $subtype = VehicleSubtype::find($id);
        $subtype->title = $validatedData['title'];
        $subtype = $subtype->save();
        if ($subtype){
            return redirect()->back()->with('success', 'Model updated successfully');
        }else{
            return redirect()->back()->with('error', 'There is error while updating Model');
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id){
        $subtype = VehicleSubtype::find($id);
        $subtype = $subtype->delete();
        if ($subtype){
            return redirect()->back()->with('success', 'Model Deleted successfully');
        }else{
            return redirect()->back()->with('error', 'There is error while deleting Model');
        }
    }

    /**
     * Ajax request Response for get subtypes
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubCategories($id){
        $category = VehicleCategory::find($id);
        $sub_types = $category->subtypes;
        return response()->json($sub_types);
    }
}
