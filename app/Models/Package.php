<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
     protected $fillable = ['title','icon_img','package_price','interests','reshty','expiry_duration'];

    /**
     * @param $formData
     */
     public function savePackage($formData){
         $this::create($formData);
     }
     
    public function updatePackage($formData , $edit_id){
        $this::where('id',$edit_id)->update($formData);
    }

}

