<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reshta extends Model
{
    protected $table = 'reshta';
    protected $fillable =[
        'user_id', 'on_behalf', 'first_name', 'last_name',
        'gender', 'dob', 'marital_status', 'religion',
        'nationality', 'cast', 'self_description',

        'profession', 'education', 'eyes_color', 'monthly_income', 'height',
        'weight', 'blood_group', 'hair_color', 'skin_tone', 'body_type', 'any_disability',
        'smoking',

        'city','state','country','permanent_address',
        'temp_address'
    ];

    /**
     * @return BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }


    /**
     * @return HasMany
     */
    public function reshtaMedia(){
        return $this->hasMany(ReshtaMedia::class ,'reshta_id','id');
    }







    /**
     * @param $form_data
     * @return mixed
     */
    public function createReshta($form_data){
       $form_data = array_merge($form_data,['user_id'=>auth()->id()]);
       return $this->create($form_data);
    }

}
