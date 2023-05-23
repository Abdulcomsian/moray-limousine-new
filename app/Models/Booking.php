<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\Partner;
use App\Models\Enduser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Auth;
use DB;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'lat_pck', 'long_pck', 'lat_drop', 'long_drop', 'pick_address', 'drop_address', 'travel_amount',
        'extra_options_amount',
        'net_amount', 'payment_status', 'estimated_distance', 'estimated_time',
        'pick_time',
        'pick_date',
        'booking_type',
        'booking_status',
        'user_id',
        'vehicle_type_id',
        'booking_city',
        'tax_amount',
        'grand_total',
        'partner_payment_status',
        'flight_no',
        'sign_board',
        'reference_code'
    ];


    /**
     * @return HasOne
     */
    public function invoice()
    {
        return $this->hasOne(invoice::class);
    }


    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function selectedOptions()
    {
        return $this->hasMany(SelectedOption::class);
    }

    /**
     * @return BelongsToMany
     */
    public function driver()
    {
        return $this->belongsToMany(
            User::class,
            'booking_user',
            'booking_id',
            'user_id'
        )
            ->withPivot('status', 'assigned_at', 'booking_date', 'commission', 'calculated_price', 'driver_status', 'assigned_to','admin_assign');
    }

   public function checkdriverassign()
   {
     return $this->belongsToMany(
            User::class,
            'booking_user',
            'booking_id',
            'user_id'
        )->where(['driver_status'=>'accepted','assigned_to'=>'driver'])
     ->withPivot('status', 'assigned_at', 'booking_date', 'commission', 'calculated_price', 'driver_status', 'assigned_to','admin_assign');
   }

    public function adminassign()
    {
        return $this->belongsToMany(
            User::class,
            'booking_user',
            'booking_id',
            'user_id'
        )
        ->where('admin_assign',1)
            ->withPivot('status', 'assigned_at', 'booking_date', 'commission', 'calculated_price', 'driver_status', 'assigned_to','admin_assign');
    }

    /**
     * @return BelongsToMany
     */
    public function vehicle()
    {
        return $this->belongsToMany(
            Vehicle::class,
            'booking_vehicle',
            'booking_id',
            'vehicle_id'
        )
            ->withPivot('status', 'assigned_at', 'booking_date');
    }

    /**
     * @return BelongsToMany
     */
    public function partner()
    {
        return $this->belongsToMany(
            User::class,
            'booking_user',
            'booking_id',
            'user_id'
        )
            ->withPivot('status', 'assigned_at', 'booking_date', 'commission', 'calculated_price', 'assigned_to');
    }

    /**
     * @return BelongsTo
     */
    public function vehicleType()
    {
        return $this->belongsTo(VehicleCategory::class, 'vehicle_type_id');
    }

    /**
     * @return HasMany
     */
    public function extended_bookings()
    {
        return $this->hasMany(ExtendBooking::class);
    }

    /**
     * @return HasOne
     */
    public function otherUser()
    {
        return $this->hasOne(OtherUser::class);
    }


    /**
     * @return bool
     */
    public function isDriverAssigned()
    {
        $drivers = $this->driver()->get();
        $isAssigned = false;
        foreach ($drivers as $driver) {
            if ($driver->user_type == 'driver') {
                $isAssigned = true;
            }
        }
        return $isAssigned;
    }

    /**
     * @param $classes
     * @param $d
     * @param $form_data
     * @return array
     */
    public function classesWithPriceByDistance($classes, $d, $form_data)
    {

        $tax_rate = 0.0;
        if (!empty(Configuration::first()->tax_rate)) {
             $tax_rate = Configuration::first()->tax_rate;
        }
        $classesWithPrice = array();
        foreach ($classes as $class) {
            $classPricing = $class->pricing
                ->where('pricing_type', 'per_km')
                ->where('from', '<=', $d)
                ->where('to', '>=', $d);
            if (count($classPricing) > 0)
            {
                //             Add Discount or Markup in Price
                // $classDiscount =  $class->discount()->where('status', 'active')
                //     ->whereDate('start_date', '<=', $form_data['pick_date'])
                //     ->whereDate('end_date', '>', $form_data['pick_date'])
                //     ->whereTime('start_time', '<=', $form_data['pick_time'])
                //     ->first();


                // $discount_rate = null;
                // $markup_rate = null;
                // if ($classDiscount) {
                //     if ($classDiscount->discount_rate == null) {
                //         $markup_rate = $classDiscount->price_up_rate;
                //     } else {
                //         $discount_rate = $classDiscount->discount_rate;
                //     }
                // }

                $pricing_type = $classPricing->first()->is_price_fixed;

                if ($pricing_type == 1 or $pricing_type == true) {
                    $classPrice = $classPricing->first()->fixed_price;
                    //Adding Discount amount in class
                    // isset($discount_rate) ? $classPrice = $classPrice - ($classPrice * $discount_rate / 100) :
                    //     $classPrice = $classPrice + ($classPrice * $markup_rate / 100);

                    //$tax_amount = $classPrice * $tax_rate / (100 + (int)$tax_rate);
                    $tax_amount = $classPrice * $tax_rate / (100);
                    $classPrice += $tax_amount;

                    $class->setAttribute('class_price', number_format($classPrice, 2));
                    $class->setAttribute('tax_amount', number_format($tax_amount, 2));
                    $classesWithPrice[] = $class;
                } else {
                     $classPrice = $classPricing->first()->base_price;
                     $classPrice = $classPrice * $d;
                    // isset($discount_rate) ? $classPrice = $classPrice - ($classPrice * $discount_rate / 100) :
                    //     $classPrice = $classPrice + ($classPrice * $markup_rate / 100);
                    //Calculation and Adding tax amount
                    // $tax_amount = $classPrice * $tax_rate / (100 + (int)$tax_rate);
                     $tax_amount = $classPrice * $tax_rate / (100);
                    $classPrice += $tax_amount;
                    $class->setAttribute('class_price', number_format($classPrice, 2));
                    $class->setAttribute('tax_amount', number_format($tax_amount, 2));
                    $classesWithPrice[] = $class;
                }

                 //working for city wise price
                $countrywiseprice=DB::table('city_wise_pricing')->where(['category'=>$class->name,'country'=>$form_data['booking_country'],'type'=>'fixed'])->where('status', 'active')
                    ->whereDate('start_date', '<=', $form_data['pick_date'])
                    ->whereDate('end_date', '>', $form_data['pick_date'])
                    ->whereTime('start_time', '<=', $form_data['pick_time'])
                    ->first();

                if($countrywiseprice)
                {
                    $percetageprice=($class->class_price/100)*$countrywiseprice->price;
                    $class->class_price += $percetageprice;
                    $class->setAttribute('class_price', number_format($class->class_price, 2));
                }
                else{
                    $result=DB::table('city_wise_pricing')->where(['category'=>$class->name,'city'=>$form_data['booking_city'],'type'=>'fixed'])->where('status', 'active')
                    ->whereDate('start_date', '<=', $form_data['pick_date'])
                    ->whereDate('end_date', '>', $form_data['pick_date'])
                    ->whereTime('start_time', '<=', $form_data['pick_time'])
                    ->first();
                    if($result)
                    {
                        $percetageprice=(($class->class_price/100)*$result->price);
                        $class->class_price += $percetageprice;
                       $class->setAttribute('class_price', number_format($class->class_price, 2));
                    }
                }




            }
        }
        return $classesWithPrice;
    }

    /**
     * @param $classes
     * @param $durationInHours
     * @return array
     */
    public function classesWithPriceByDuration($classes, $durationInHours,$form_data=null)
    {
        $classesWithPrice = array();
        $tax_rate = 0.0;
        if (!empty(Configuration::first()->tax_rate)) {
            $tax_rate = Configuration::first()->tax_rate;
        }
        foreach ($classes as $class) {
            $classPricing = $class->pricing()
                ->where("pricing_type", 'per_hr')
                ->where('from', '<=', $durationInHours)
                ->where('to', '>=', $durationInHours)->get();

            if (count($classPricing) > 0) {
                 $pricing_type = $classPricing->first()->is_price_fixed;
                if ($pricing_type == 1 or $pricing_type == true) {
                    $classPrice = $classPricing->first()->fixed_price;

                    //$tax_amount = $classPrice * $tax_rate / (100 + (int)$tax_rate);
                    $tax_amount = $classPrice * $tax_rate / (100);
                    $classPrice += $tax_amount;

                    $class->setAttribute('class_price', number_format($classPrice, 2));
                    $class->setAttribute('tax_amount', number_format($tax_amount, 2));
                    $classesWithPrice[] = $class;
                } else {
                    $classPrice = $classPricing->first()->base_price;
                    $classPrice = $classPrice * $durationInHours;

                    //$tax_amount = $classPrice * $tax_rate / (100 + (int)$tax_rate);
                    $tax_amount = $classPrice * $tax_rate / (100);
                    $classPrice += $tax_amount;
                    $class->setAttribute('class_price', number_format($classPrice, 2));
                    $class->setAttribute('tax_amount', number_format($tax_amount, 2));
                    $classesWithPrice[] = $class;
                }
                //check first country wise price
                $countrywiseprice=DB::table('city_wise_pricing')->where(['category'=>$class->name,'country'=>$form_data['booking_country'],'type'=>'hour'])->where('status', 'active')
                    ->whereDate('start_date', '<=', $form_data['pick_date'])
                    ->whereDate('end_date', '>', $form_data['pick_date'])
                    ->whereTime('start_time', '<=', $form_data['pick_time'])
                    ->first();
                if($countrywiseprice)
                {
                    $percetageprice=(($class->class_price/100)*$countrywiseprice->price);
                    $class->class_price += $percetageprice;
                    $class->setAttribute('class_price', number_format($class->class_price, 2));
                }
                else{
                    $result=DB::table('city_wise_pricing')->where(['category'=>$class->name,'city'=>$form_data['booking_city'],'type'=>'hour'])->where('status', 'active')
                    ->whereDate('start_date', '<=', $form_data['pick_date'])
                    ->whereDate('end_date', '>', $form_data['pick_date'])
                    ->whereTime('start_time', '<=', $form_data['pick_time'])
                    ->first();
                    if($result)
                    {
                        $percetageprice=(($class->class_price/100)*$result->price);
                        $class->class_price += $percetageprice;
                        $class->setAttribute('class_price', number_format($class->class_price, 2));
                    }
                }

            }
        }
        return $classesWithPrice;
    }

    /**
     * @param $tax
     * @param $form_data
     * @param $id
     * @param $distance
     * @param $travel_amount
     * @return mixed
     */
    public function  saveBookingOnSelect($form_data, $id, $travel_amount, $distance, $tax)
    {
        if (isset($form_data->total_duration)) {
            $durationInHours = $form_data->total_duration / 3600;
            $lat_drop =  $form_data->lat_drop;
            $long_drop = $form_data->long_drop;
            $drop_address = $form_data->drop_address;
        }
        if (isset($form_data->selected_hour)) {
            $durationInHours = $form_data->selected_hour;
            $lat_drop =  null;
            $long_drop = null;
            $distance = $durationInHours * 25;
            $drop_address = null;
        }

        $booking = $this::create([
            'user_id' => Auth()->id(),
            'lat_pck' => $form_data->lat_pck,
            'long_pck' => $form_data->long_pck,
            'lat_drop' => $lat_drop,
            'long_drop' => $long_drop,
            'pick_address' => $form_data->pick_address,
            'drop_address' => $drop_address,
            'booking_city' => $form_data->booking_city,
            'pick_time' => $form_data->pick_time,
            'pick_date' => $form_data->pick_date,
            'estimated_distance' => (float)$distance,
            'estimated_time' => $durationInHours,
            'booking_type' => $form_data->booking_by,
            'travel_amount' =>  (float)$travel_amount,
            'payment_status' => 'pending',
            'vehicle_type_id' => $id,
            'tax_amount' => $tax
        ]);
        return $booking;
    }

    /**
     * @param $options
     * @param $booking_id
     * @return Booking
     */
    public function saveSelectedOptions($options, $booking_id, $travel_amount, $form_data, $tax_amount)
    {
        $options_price = 0;
        $user_id = Auth::user()->id;
        if ($options !== null or $options) {
            foreach ($options as $option) {
                SelectedOption::create([
                    'booking_id' => $booking_id,
                    'option_name' => $option->selected_option,
                    'quantity' => $option->quantity,
                    'price' => $option->option_price,
                    'option_id' => $option->option_id
                ]);
                $options_price =  $options_price + ($option->option_price * $option->quantity);
            }
        }
        //check if booking for someone else is not checked
        if (isset($form_data['bookdtls'])) {
            $userexist = Enduser::where('user_id', $user_id)->first();
            if ($userexist) {
                Enduser::where('user_id', $user_id)->update([
                    'billing_address' => $form_data['bill_address'],
                    'billing_postal_code' => $form_data['post_code'],
                    'billing_city' => $form_data['place'],
                    'billing_country' => $form_data['country'],
                    'vat_no' => $form_data['vat'],
                    'skype_id' => $form_data['Company']
                ]);
            } else {
                $enduser = new Enduser();
                $enduser->user_id = $user_id;
                $enduser->billing_address = $form_data['bill_address'];
                $enduser->billing_postal_code = $form_data['post_code'];
                $enduser->billing_city = $form_data['place'];
                $enduser->billing_country = $form_data['country'];
                $enduser->vat_no = $form_data['vat'];
                $enduser->skype_id = $form_data['Company'];
                $enduser->save();
            }
        }
        //
        $extrapricetaxamount = 0;
        if (!empty(Configuration::first()->tax_rate)) {
            $tax_rate = Configuration::first()->tax_rate;
            if ($options_price) {
                $extrapricetaxamount = $options_price / 100 * $tax_rate;
            }
        }
        $this::where('id', $booking_id)->update([
            'extra_options_amount' => $options_price,
            'travel_amount' => $travel_amount + $extrapricetaxamount,
            'net_amount' => $travel_amount + $options_price + $extrapricetaxamount,
            'flight_no' => $form_data['flight_no'],
            'sign_board' => $form_data['sign_board'],
            'reference_code' => $form_data['reference_code'],
            'tax_amount' => $tax_amount + $extrapricetaxamount
        ]);
        $booking = $this::find($booking_id);
        return $booking;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function findBooking($id)
    {
        return $this->find($id);
    }









    /**
     * @param $booking
     * @param $total_distance
     * @return float|int|null
     *
     */
    public function getClassPriceDistance($booking, $total_distance)
    {

        $new_price = $booking->vehicleType->pricing()
            ->where('pricing_type', 'per_km')
            ->where('from', '<=', $total_distance)
            ->where('to', '>=', $total_distance)->get();

        if (!$new_price->isEmpty()) {
            $pricing_type = $new_price->first()->is_price_fixed;
            if ($pricing_type == 1 or $pricing_type == true) {
                $classPrice = $new_price->first()->fixed_price;
                return $classPrice;
            } else {
                $classPrice = $new_price->first()->base_price;
                $classPrice = $classPrice * $total_distance;
                return $classPrice;
            }
        } else {
            return null;
        }
    }

    /**
     * @param $booking
     * @param $durationInHours
     * @return float|\Illuminate\Http\RedirectResponse|int
     */
    public function extendPriceByTime($booking, $durationInHours)
    {
        $classPrice = 0.00;
        $classPricing = $booking->vehicleType->pricing()
            ->where("pricing_type", 'per_hr')
            ->where('from', '<=', $durationInHours)
            ->where('to', '>=', $durationInHours)->get();

        if ($classPricing->isEmpty()) {
            $message = 'Services are not available please try again';
            return redirect(route('home'))->with('error', $message);
        }
        $pricing_type = $classPricing->first()->is_price_fixed;
        if ($pricing_type == 1 or $pricing_type == true) {
            $classPrice = $classPricing->first()->fixed_price;
            return $classPrice;
        } else {
            $classPrice = $classPricing->first()->base_price;
            $classPrice = $classPrice * $durationInHours;
            return $classPrice;
        }
    }
    /**
     * @param $latitude1
     * @param $longitude1
     * @param $latitude2
     * @param $longitude2
     * @return float|int
     * Haversine Farmula for Distance in KM
     */
    protected function getDistance($latitude1, $longitude1, $latitude2, $longitude2)
    {
        $earth_radius = 6371;
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;
        return $d;
    }
}
