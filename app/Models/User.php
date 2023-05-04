<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\Enduser;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
// use Lunaweb\EmailVerification\Traits\CanVerifyEmail;
// use Lunaweb\EmailVerification\Contracts\CanVerifyEmail as CanVerifyEmailContract;
use App\Notifications\Emailvarification;

class User extends Authenticatable
{
    use Notifiable;
    // use CanVerifyEmail;

    // class add user error -> Authenticatable implements CanVerifyEmailContract

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone_number', 'user_type', 'creator_id', 'status'
    ];

    /**
     * @return HasOne
     */

    // public function sendEmailVerificationNotification($token, $expiration)
    // {
    //     $this->notify(new Emailvarification($token, $expiration, $this->email));
    // }

    public function partner()
    {
        return $this->hasOne(Partner::class);
    }

    /**
     * @return HasOne
     */
    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    /**
     * @return HasMany
     */
    public function uploadedDocuments()
    {
        return $this->hasMany(UploadedDocument::class);
    }

    /**
     * @return HasOne
     */
    public function endUser()
    {
        return $this->hasOne(Enduser::class);
    }

    /**
     * @return HasOne
     */
    public function userMedia()
    {
        return $this->hasOne(UsersMedia::class);
    }

    /**
     * @return HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }



    public function userName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function locations()
    {
        return $this->belongsToMany(
            Location::class,
            'user_location',
            'user_id',
            'location_id'
        )->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_user', 'creator_id', 'user_id')->withPivot('status')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function addedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_user', 'user_id', 'creator_id')->withPivot('status')->withTimestamps();
    }


    /**
     * @param $data
     * @return mixed
     */
    public function registerDriver($data)
    {
        return $this::create([

            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'creator_id' => $data['creator_id'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return BelongsToMany
     */
    public function booking()
    {
        return $this->belongsToMany(
            Booking::class,
            'booking_user',
            'user_id',
            'booking_id'
        )
            ->withPivot('status', 'assigned_at', 'booking_date', 'commission', 'calculated_price', 'assigned_to');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findPartner($id)
    {
        return $this::find($id);
    }

    /**
     * @param $duration_In_Sec
     * @return float|int
     */
    public function durationInHour($duration_In_Sec)
    {
        $minutes = floor($duration_In_Sec / 60);
        $inHour = $minutes / 60;
        return $inHour;
    }


    /**Store Extended Amount
     *
     * @param $form_data
     * @param $booking
     * @param $extended_amount
     * @param $grand_total
     * @return mixed
     */
    public function storeExtendedBooking($form_data, $booking, $extended_amount, $grand_total)
    {
        $tax_rate = 0.0;
        if (!empty(Configuration::first()->tax_rate)) {
            $tax_rate = Configuration::first()->tax_rate;
        }
        if ($booking->booking_type == 'time') {
            $form_data['new_drop_lat'] = 0.000;
            $form_data['new_drop_long'] = 0.000;
            $form_data['new_drop_location'] = "This Booking is in hours";
            $form_data['extended_duration'] = $form_data['selected_hour'];
        }
        $tax_amount = $extended_amount * $tax_rate / (100 + (int)$tax_rate);
        $extended_amount += $tax_amount;

        return ExtendBooking::create([
            'booking_id' => $booking['id'],
            'previous_drop_location' => $form_data['previous_drop_location'],
            'new_drop_location' => $form_data['new_drop_location'],
            'new_drop_lat' => $form_data['new_drop_lat'],
            'new_drop_long' => $form_data['new_drop_long'],
            'extended_distance' => $form_data['extended_distance'],
            'extended_duration' => $form_data['extended_duration'],
            'previous_net_amount' => $booking['net_amount'],
            'extended_amount' => $extended_amount,
            'new_net_amount' => $grand_total,
            'payment_status' => 'pending',
            'tax_amount' => $tax_amount
        ]);
    }
}
