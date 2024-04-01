<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\VehicleCategory;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    /**
     * @param $time
     * @return string
     */
    public function timeFormat($time){
        $stripped = str_replace(' ', '', $time);;
        $dateTime = new Carbon($stripped);
        $s=$dateTime->parse($dateTime);
        $military_time =$s->format('G:i:s');
        return $military_time;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveDiscount(Request $request){
        $form_data = $request->all();
        $id = null;
        $id = $form_data['id'];
        $class = VehicleCategory::find($form_data['category_id']);
        $start_time = $this->timeFormat($form_data['start_time']);
        $end_time = $this->timeFormat($form_data['end_time']);
        $form_data['start_time'] = $start_time;
        $form_data['end_time'] = $end_time;

        $classDiscount =  $class->discount()
            ->whereDate('start_date' ,'>=', $form_data['start_date'])
            ->whereDate('end_date' ,'>=', $form_data['end_date'])
            ->whereTime('start_time' ,'>=', $form_data['start_time'] )
            ->whereTime('end_time' ,'<=', $form_data['end_time'] )
            ->get();

        if ($id == null){
            if (count($classDiscount) > 0){
                return redirect(route('discount.list'))->with('error','Error ...  !  Discount Or Markup In This Date & Time Range Already Exist.');
            };
            Discount::create($form_data);
        }else{
            $request['start_time']= $start_time;
            $request['end_time']= $end_time;
            Discount::where('id',$id)->update($request->except('_token'));
        }
        return redirect(route('discount.list'))->with('success','Success ! Discount Saved Successfully');
    }

    /** Get By Ajax Request for Update
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editDiscount($id){
        $discount = Discount::find($id);
        $data['discount'] = $discount;
        $data['category'] = $discount->category;
        return response()->json($data);
    }

    public function discountDelete($id){
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return redirect(route('discount.list'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function discountDisActive($id){
        $discount = Discount::findorfail($id);
        if ($discount){
            $discount->status = 'dis_active';
            $discount->save();
            return redirect(route('discount.list'))->with('success','Success ! Discount Activated Successfully');
        }else{
            return redirect(route('discount.list'))->with('error','Error ! No Record Found ..');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
 public function discountActive($id){
        $discount = Discount::findorfail($id);
        if ($discount){
            $discount->status = 'active';
            $discount->save();
            return redirect(route('discount.list'))->with('success','Success ! Discount Activated Successfully');
        }else{
            return redirect(route('discount.list'))->with('error','Error ! No Record Found ..');
        }

    }

}
