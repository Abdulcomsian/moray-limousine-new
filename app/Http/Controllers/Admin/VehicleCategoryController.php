<?php

namespace App\Http\Controllers\Admin;

use App\VehicleSubtype;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Routing\Redirector;


class VehicleCategoryController extends Controller
{
    public function index(){
        $data['vehicleCategory'] = VehicleCategory::all();
        return view('admin.vehicleCategory.list',$data);
    }

    public function add(){
        return view('admin.vehicleCategory.add');
    }

    public function save(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,bmp,png|max:2000',
            'description' => 'required|string',
        ]);

        $vehicleCategory = new VehicleCategory();
        $vehicleCategory->name = $request->input('name');
        $vehicleCategory->picture = '';
        $vehicleCategory->description = $request->input('description');
        $vehicleCategory->save();
        $picture = $request->file('picture');
        $vehicleCategory->picture = $picture->getClientOriginalName();
        $vehicleCategory->update();
        $picture->move(public_path().'/files/vehicleCategory/category_'.$vehicleCategory->id.'/',$vehicleCategory->picture);
        return redirect(url('admin/vehicleCategory'))->with('status','New Vehicle Class Is added successfully');
    }

    public function edit($id){
        $data['vehicleCategory'] = VehicleCategory::findOrFail($id);
        return view('admin.vehicleCategory.edit',$data);
    }
    protected $categoryRules = [
        'name' => 'required|string',
        'description' => 'required'
    ];

    public function update(Request $request){
        $this->validate($request,[
            'id' => 'required|integer',
            'name' => 'required|string',
            'picture' => 'image|mimes:jpeg,bmp,png|max:2000',
            'description' => 'required|string'
        ]);
        $vehicleCategory = VehicleCategory::findOrFail($request->input('id'));
        $vehicleCategory->name = $request->input('name');
        $vehicleCategory->description = $request->input('description');
        if($request->file('picture')){
            $picture = $request->file('picture');
            $vehicleCategory->picture = $picture->getClientOriginalName();
            $picture->move(public_path().'/files/vehicleCategory/category_'.$vehicleCategory->id.'/',$vehicleCategory->picture);
        }
        $vehicleCategory->update();
        return redirect(url('admin/vehicleCategory'))->with('status','Vehicle Class has been updated.');
    }

    public function delete($id){
        $vehicleCategory = VehicleCategory::findOrFail($id);
        // Check is there vehicle exists against this vehicleCategory
        $vehicleCount = Vehicle::where('category_id',$id)->get()->count();
        if($vehicleCount > 0){
            return redirect(url('admin/vehicleCategory'))->with('error','Vehicle Class is in use you cannot delete it');
        }
        $vehicleCategory->delete();
        return redirect(url('admin/vehicleCategory'))->with('status','Vehicle Class has been deleted');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCategoty(){
        $categories = VehicleCategory::all();
        $subtypes = VehicleSubtype::all();
        $data['categories'] = $categories;
        $data['subtypes'] = $subtypes;
        return view('admin.vehicleCategory.add-vehicle-category',$data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function saveNewCategory(Request $request){

        $image = null;
        $id =  $request->id;
        $this->validate($request, $this->categoryRules);
        if($request->hasFile('picture')){;
            $image = time().$request->picture->getClientOriginalName();
            $request->picture->move(public_path('files/vehicleCategory/category_img'),$image);
        }
        if ($id == null or $id == ''){
            $formData = $request->all();
            if (isset($image)){
                $formData['picture'] = $image;
            }
            $category = VehicleCategory::create($formData);
            $category->subtypes()->detach();
            if ($category){
                $subtypes = $request->subtypes;
                foreach ($subtypes as $subtype){
                    $category->subtypes()->attach($subtype);
                }
            }
        }else{
            $formData = $request->except('_token','subtypes');
            if (isset($image)){
                $formData['picture'] = $image;
            }
            else{
                $formData = $request->except('_token', 'picture', 'subtypes');
            }
             VehicleCategory::where('id',$id)->update($formData);
            $category = VehicleCategory::find($id);
            if ($category) {
                $subtypes = $request->subtypes;
                $category->subtypes()->detach();
                foreach ($subtypes as $subtype) {
                    $category->subtypes()->attach($subtype);
                }
            }
        }

        return redirect(route('add.category'));
    }

    public function updateCategory($id){
        $category =  VehicleCategory::find($id);
        $data['category'] = $category;
        $data['subtypes'] = $category->subtypes()->get();
        return response()->json($data);
    }

    public function categoryDelete($id){
        VehicleCategory::where('id',$id)->delete();
        return redirect(route('add.category'));
    }

}
