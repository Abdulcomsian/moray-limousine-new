<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partner extends Model
{
    protected $fillable = ['user_id','skype_id','date_of_birth', 'phone_number','whats_app',
        'address','gender','default_location'];

    /**
     * @return BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     */
    public function partnerName(){
        $user = $this->user()->first();
        $partnerName = $user->first_name . ' ' . $user->last_name;
        return $partnerName;
    }

    /**
     * @return BelongsToMany
     */
    public function bookings(){
        return $this->belongsToMany(Booking::class, 'booking_partner',
            'partner_id', 'booking_id');
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
     * @param $locations
     * @return mixed
     */
    public function createProfile($request , $locations){
       if (auth()->user()->locations){
           auth()->user()->locations()->detach();
       }
        foreach ($locations as $location){
            auth()->user()->locations()->attach($location);
        }

      return  $this::create($request);
    }

    /**
     * @param $formData
     * @param $id
     */
    public function updateProfile($formData, $id, $locations){
        auth()->user()->locations()->detach();
        $formData['id'] = $id;
        $this::create($formData);
        foreach ($locations as $location){
            auth()->user()->locations()->attach($location);
        }
    }

}
