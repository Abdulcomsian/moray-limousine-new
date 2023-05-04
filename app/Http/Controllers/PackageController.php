<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    private $package;
    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPackage()
    {
        $packages = $this->package->all();
        return view('admin.packages.add-package')->with('packages',$packages);
    }



    public function savePackage(PackageRequest $request){
        $request->validated();
        $img_name = null;
        $edit_id = $request['edit_id'];
        $form_data = $request->except('edit_id');
//        Saving Image
        if ($request->hasFile('icon_img')) 
        {
            $img_name = time() . $request->icon_img->getClientOriginalName();
            $request->icon_img->move(public_path('images/uploaded-images'), $img_name);
        }
        if ($edit_id == null){
            $form_data['icon_img'] = $img_name;
            $this->package->savePackage($form_data);
            return redirect()->back()->with('success','A new package is created successfully ..');
        }else{
            $form_data = $request->except('_token','edit_id');
            $img_name ? $form_data['icon_img'] = $img_name : $form_data = $request->except('_token','edit_id','icon_img') ;
            $this->package->updatePackage($form_data , $edit_id);
            return redirect()->back()->with('success','Package Updated successfully ..');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editPackage($id){
        $package = $this->package->find($id);
        return response()->json($package);
    }

    /**User Side Listing
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function packagesDetail(){
        $packages = $this->package->all();
        return view('front-end.package')->with('packages',$packages);
    }

    /**This method Will run after Successful Payment
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function purchasePackages($id){
        $package = $this->package->find($id);
        $package_months = $package->expiry_duration;
        $user = Auth()->user();
        $user->allowed_reshty  +=   $package->reshty;
        $user->allowed_interests  +=   $package->interests;
        $user->status  = 'paid';
        $user->save();
        $user->packages()->attach($id , ['expiry_date'=> Carbon::now()->addMonths($package_months)]);
        return redirect()->back()->with('success','Packaged Is Successfully Subscribed ....');
    }
}
