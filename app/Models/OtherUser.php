<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherUser extends Model
{
    protected $fillable = ['first_name',
        'last_name',
        'email',
        'phone_number',
        'additional_information',
        'booking_id',
        'flight_number',
        'flight_information',
        'banner_words',
        'company',
        'billing_address',
        'postcode',
        'country'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }




    public function storeOtherUser($form_data,$booking_id)
    {

      if(isset($form_data['booksomeone']))
      {
           //or isset($form_data->flight_number) or isset($form_data->additional_information) or isset($form_data->banner_words
           if (isset($form_data['first_name']) or isset($form_data['email']) or isset($form_data['phone_number']))
           {
           return $this->create([
               'booking_id' => $booking_id,
               'first_name' => $form_data['first_name'],
               'last_name' => $form_data['last_name'],
               'email' => $form_data['email'],
               'phone_number' => $form_data['phone_number'],
               'additional_information' => $form_data['additional_information'],
               'company'=>$form_data['company'],
               'billing_address'=>$form_data['address'],
               'postcode'=>$form_data['postcode'],
               'country'=>$form_data['land'],

               // 'flight_number' => $form_data->flight_number,
               // 'flight_information' => $form_data->flight_information,
               // 'banner_words' => $form_data->banner_words,

           ]);
           } else
           {
               return null;
           }
     }
    }
}
