<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Driver extends Model
{
    protected $fillable = ['user_id','date_of_birth','gender','phone_number','whats_app','skype_id','address','permanent_address','default_location','additional_information',
        'vehicle_licence_no','vehicle_licence_expiry', 'pco_licence_no','pco_licence_expiry', 'id_card_number'];

    /**
     * @return BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }


    /**
     * @return mixed
     */
    public function driverName(){
        $user = $this->user()->first();
        $driverName = $user->first_name . ' ' . $user->last_name;
        return $driverName;
    }


    /**
     * @param $fromdata
     */
    public function createNewVehicle($formData){
        Vehicle::create($formData);
    }
    /**
     * @param $formData
     * @param $id
     */
    public function updateVehicle($formData,$id){
        Vehicle::where('id',$id)->update($formData);
    }

    /**
     * @param $request
     */
    public function createDriverProfile($request, $locations){
        if (auth()->user()->locations){
            auth()->user()->locations()->detach();
        }
        foreach ($locations as $location){
            auth()->user()->locations()->attach($location);
        }

        $this::create($request);
    }

    public function updateDriverProfile($formData , $id , $locations){
        auth()->user()->locations()->detach();
        foreach ($locations as $location){
            auth()->user()->locations()->attach($location);
        }
        $request['id'] = $id;
        $this::where('id' , $id)->update($formData);
    }
}
