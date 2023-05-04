<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PricingByDistance;
use App\Models\Vehicle;
use App\Models\VehiclePricing;
use App\Models\PricingByLocation;
use App\Models\VehicleCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VehiclePricingController extends Controller
{
    private $vehiclePricing;

    /**
     * VehiclePricingController constructor.
     * @param $vehiclePricing
     */
    public function __construct(VehiclePricing $vehiclePricing)
    {
        $this->vehiclePricing = $vehiclePricing;
    }


    public function index(){
        $data['vehiclePricing'] = VehiclePricing::all();
        $vehicleCategories = VehicleCategory::all();
        return view('admin.vehiclePricing.list',compact('vehicleCategories'));
    }

    public function add(){
        $data['vehicles'] = Vehicle::all();
        $data['pricingByDistance'] = PricingByDistance::all();
        $data['pricingByLocation'] = PricingByLocation::all();
        return view('admin.vehiclePricing.add',$data);
    }

    /**
     * @param $categoryId
     * @return Factory|View
     */
    public function addPricing($categoryId){
        $vehicleCategory = VehicleCategory::find($categoryId);
        $edit = false;
        return view('admin.vehiclePricing.add-pricing', compact('vehicleCategory', 'edit'));
    }

    /**
     * @param $categoryId
     * @return Factory|View
     */
    public function editPricing($categoryId){
        $vehicleCategory = VehicleCategory::find($categoryId);
        $edit = true;
        return view('admin.vehiclePricing.add-pricing', compact('vehicleCategory', 'edit'));
    }
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function savePricing(Request $request){
        $request->validate([
            'category_id' => 'required',
            'pricing_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'price' => 'required',
            'is_price_fixed' => 'required'
        ]);

        $categoryId = $request->category_id;
        $pricingType = $request->pricing_type;
        $fromPrices = $request->from;
        $toPrices = $request->to;
        $prices = $request->price;
        $isFixedCheck = $request->is_price_fixed;

        /* if already exists, delete previous one */
        if ($request->is_edit){
            $category = VehicleCategory::find($categoryId);
            foreach ($category->pricing()->get() as $price){
                if ($price->pricing_type == $request->pricing_type){
                    $price->delete();
                }
            }
        }

        for ($i = 0; $i < count($fromPrices); $i++){
            $vehiclePricing = new VehiclePricing();
            $vehiclePricing->category_id = $categoryId;
            $vehiclePricing->pricing_type = $pricingType;
            $vehiclePricing->from = $fromPrices[$i];
            $vehiclePricing->to = $toPrices[$i];
            $vehiclePricing->is_price_fixed = $isFixedCheck[$i];
            $vehiclePricing->created_by = auth()->user()->id;
            if ($isFixedCheck[$i] == 1){
                $vehiclePricing->fixed_price = $prices[$i];
            }else{
                $vehiclePricing->base_price = $prices[$i];
            }

            if (!$vehiclePricing->save())
            {
                return redirect()->back()->with('error', 'There is error while adding new pricing');
            }
        }

        return redirect()->route('admin.vehiclePricing.edit', $categoryId)->with('success', 'New pricing added');
    }

    /**
     * @param $categoryId
     * @return Factory|View
     */
    public function detailPricing($categoryId){
        $vehicleCategory = VehicleCategory::find($categoryId);
        return view('admin.vehiclePricing.detail', compact('vehicleCategory'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function priceFields(Request $request){
        $number = $request->number;
        $unit = $request->unit;
        return view('admin._partials._add-new-price-fields', compact('number', 'unit'));
    }

    /* old function for save */
    public function save(Request $request){
        $this->validate($request,[
            'category_id' => 'required|integer',
            'pricing_type' => 'required|string',
            'from_fixed' => 'required_if:pricing_type,FIXED',
            'to_fixed' => 'required_if:pricing_type,FIXED',
            'from_location' => 'required_if:pricing_type,LOCATION',
            'to_location' => 'required_if:pricing_type,LOCATION',
            'location_price' => 'required_if:pricing_type,LOCATION',
            'fixed_location_price' => 'required_if:pricing_type,FIXED',
            'fixed_location_return_price' => 'required_if:pricing_type,FIXED',
            'base_price' => 'required_if:include_base_price,1',
            'hour' => 'required_if:pricing_type,PER_HOUR',
            'per_hour' => 'required_if:pricing_type,PER_HOUR',
        ]);

        $vehiclePricing = new VehiclePricing();
        $vehiclePricing->category_id = $request->input('category_id');
        $vehiclePricing->pricing_type = $request->input('pricing_type');
        if($request->input('pricing_type') == 'FIXED'){
            $vehiclePricing->from = $request->input('from_fixed');
            $vehiclePricing->to = $request->input('to_fixed');
        }elseif($request->input('pricing_type') == 'LOCATION'){
            $vehiclePricing->from = $request->input('from_location');
            $vehiclePricing->to = $request->input('to_location');
            $vehiclePricing->location_price = $request->input('location_price');
        }
        $vehiclePricing->fixed_location_price = $request->input('fixed_location_price');
        $vehiclePricing->fixed_location_return_price = $request->input('fixed_location_return_price');
        $vehiclePricing->base_price = $request->input('base_price');
        $vehiclePricing->hour = $request->input('hour');
        $vehiclePricing->hour_price = $request->input('per_hour');
        $vehiclePricing->created_by = Auth::user()->id;
        $vehiclePricing->save();
        return redirect(url('admin/vehiclePricing'))->with('status','Pricing By Location has been added');
    }

    public function edit($id){
        $data['vehiclePricing'] = VehiclePricing::all();
        $data['vehicleCategory'] = VehicleCategory::all();
        $data['vPrice'] = VehiclePricing::findOrFail($id);
        return view('admin.vehiclePricing.list',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            'id' => 'required|integer',
            'vehicle_id' => 'required|integer',
            'pricing_type' => 'required|string',
            'pricing_id' => 'required|integer',
            'base_price' => 'required|integer',
        ]);
        $vehiclePricing = VehiclePricing::findOrFail($request->input('id'));
        $vehiclePricing->vehicle_id = $request->input('vehicle_id');
        $vehiclePricing->pricing_type = $request->input('pricing_type');
        $vehiclePricing->pricing_id = $request->input('pricing_id');
        $vehiclePricing->base_price = $request->input('base_price');
        $vehiclePricing->update();
        return redirect(url('admin/vehiclePricing'))->with('status','Pricing By Location has been updated.');
    }

    public function delete($id)
    {
        $vehiclePricing = VehiclePricing::findOrFail($id);
        // Check Booking
        // $vehicleCount = VehiclePricing::where('pricing_id',$id)->where('pricing_type','LOCATION')->get()->count();
        // if($vehicleCount > 0){
        //     return redirect(url('admin/vehiclePricing'))->with('error','Pricing By Location is in use you cannot delete it');
        // }
        $vehiclePricing->delete();
        return redirect(url('admin/vehiclePricing'))->with('status','Pricing By Location has been deleted');
    }

    public function pricingDetails($id){
        $data['priceDetail'] = VehiclePricing::where('category_id',$id)->get();
        $data['typeDetail'] = VehicleCategory::find($id);
        return response()->json($data);
    }

}
