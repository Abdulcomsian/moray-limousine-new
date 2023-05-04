<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMedia extends Model
{
    protected $fillable = ['user_id','user_image'];

    /**
     * @param $form_data
     */
    public function saveImg($form_data){
      $img =  $this->create($form_data);
      return $img;
    }
}
