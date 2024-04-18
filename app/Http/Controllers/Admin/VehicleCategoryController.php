<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleSubtype;
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
        'description' => 'required',
        'long_description' => 'required',
        'feature_heading' => 'required'
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
    public function addCategory()
    {
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

        // dd($request->all());
        $image = null;
        $id =  $request->id;
        $this->validate($request, $this->categoryRules);
        if($request->hasFile('picture')){;
            $image = time().$request->picture->getClientOriginalName();
            $request->picture->move(public_path('files/vehicleCategory/category_img'),$image);
        }

        // Feature One Picture
        if($request->hasFile('feature_one_picture')){
            $featureOnePicture = time().$request->feature_one_picture->getClientOriginalName();
            $request->feature_one_picture->move(public_path('files/vehicleCategory/category_img'),$featureOnePicture);
        }

        // Feature Two Picture
        if($request->hasFile('feature_two_picture')){
            $featureTwoPicture = time().$request->feature_two_picture->getClientOriginalName();
            $request->feature_two_picture->move(public_path('files/vehicleCategory/category_img'),$featureTwoPicture);
        }

        // Feature Three Picture
        if($request->hasFile('feature_three_picture')){
            $featureThreePicture = time().$request->feature_three_picture->getClientOriginalName();
            $request->feature_three_picture->move(public_path('files/vehicleCategory/category_img'),$featureThreePicture);
        }

        // Feature Four Picture
        if($request->hasFile('feature_four_picture')){
            $featureFourPicture = time().$request->feature_four_picture->getClientOriginalName();
            $request->feature_four_picture->move(public_path('files/vehicleCategory/category_img'),$featureFourPicture);
        }

        // Feature Five Picture
        if($request->hasFile('feature_five_picture')){
            $featureFivePicture = time().$request->feature_five_picture->getClientOriginalName();
            $request->feature_five_picture->move(public_path('files/vehicleCategory/category_img'),$featureFivePicture);
        }

        // Feature Six Picture
        if($request->hasFile('feature_six_picture')){
            $featureSixPicture = time().$request->feature_six_picture->getClientOriginalName();
            $request->feature_six_picture->move(public_path('files/vehicleCategory/category_img'),$featureSixPicture);
        }


        $featureOneData = [
            "icon" => isset($featureOnePicture) ? $featureOnePicture : $request->featureOnePicture,
            "heading" => $request->feature_one_heading,
            "description" => $request->feature_one_description,
        ];

        $featureTwoData = [
            "icon" => isset($featureTwoPicture) ? $featureTwoPicture : $request->featureTwoPicture,
            "heading" => $request->feature_two_heading,
            "description" => $request->feature_two_description,
        ];

        $featureThreeData = [
            "icon" => isset($featureThreePicture) ? $featureThreePicture : $request->featureThreePicture,
            "heading" => $request->feature_three_heading,
            "description" => $request->feature_three_description,
        ];

        $featureFourData = [
            "icon" => isset($featureFourPicture) ? $featureFourPicture : $request->featureFourPicture,
            "heading" => $request->feature_four_heading,
            "description" => $request->feature_four_description,
        ];

        $featureFiveData = [
            "icon" => isset($featureFivePicture) ? $featureFivePicture : $request->featureFivePicture,
            "heading" => $request->feature_five_heading,
            "description" => $request->feature_five_description,
        ];

        $featureSixData = [
            "icon" => isset($featureSixPicture) ? $featureSixPicture : $request->featureSixPicture,
            "heading" => $request->feature_six_heading,
            "description" => $request->feature_six_description,
        ];


        if ($id == null or $id == ''){
            $formData = $request->all();
            if (isset($image)){
                $formData['picture'] = $image;
            }

            $formData['feature_1'] = json_encode($featureOneData);
            $formData['feature_2'] = json_encode($featureTwoData);
            $formData['feature_3'] = json_encode($featureThreeData);
            $formData['feature_4'] = json_encode($featureFourData);
            $formData['feature_5'] = json_encode($featureFiveData);
            $formData['feature_6'] = json_encode($featureSixData);            

            $category = VehicleCategory::create($formData);
            $category->subtypes()->detach();
            if ($category){
                $subtypes = $request->subtypes;
                foreach ($subtypes as $subtype){
                    $category->subtypes()->attach($subtype);
                }
            }
        }else{
            $formData = $request->except(
                '_token','subtypes',
                'feature_one_picture',
                'feature_two_picture',
                'feature_three_picture',
                'feature_four_picture',
                'feature_five_picture',
                'feature_six_picture',
                'featureOnePicture',        
                    'featureTwoPicture',       
                    'featureThreePicture',        
                    'featureFourPicture',        
                    'featureFivePicture',       
                    'featureSixPicture',
            );
            if (isset($image)){
                $formData['picture'] = $image;
            }
            else{
                $formData = $request->except(
                    '_token', 'picture', 'subtypes', 
                    'feature_one_picture',
                    'feature_two_picture',
                    'feature_three_picture',
                    'feature_four_picture',
                    'feature_five_picture',
                    'feature_six_picture',
                    'feature_one_heading',
                    'feature_two_heading', 
                    'feature_three_heading', 
                    'feature_four_heading', 
                    'feature_five_heading', 
                    'feature_six_heading', 
                    'feature_one_description',
                    'feature_two_description',
                    'feature_three_description',
                    'feature_four_description',
                    'feature_five_description',
                    'feature_six_description',    
                    'featureOnePicture',        
                    'featureTwoPicture',       
                    'featureThreePicture',        
                    'featureFourPicture',        
                    'featureFivePicture',       
                    'featureSixPicture',       
                );
            }
            $formData['feature_1'] = json_encode($featureOneData);
            $formData['feature_2'] = json_encode($featureTwoData);
            $formData['feature_3'] = json_encode($featureThreeData);
            $formData['feature_4'] = json_encode($featureFourData);
            $formData['feature_5'] = json_encode($featureFiveData);
            $formData['feature_6'] = json_encode($featureSixData);
            // dd($formData);
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
