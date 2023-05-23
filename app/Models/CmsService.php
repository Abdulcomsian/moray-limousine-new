<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsService extends Model
{
    protected $fillable = ['service_title','service_title2','short_description','short_description2','service_image','long_description'];

    /**
     * @param $formData
     * @return mixed
     */
    public function saveService($formData)
    {
     return  $this::create($formData);
    }

    /**
     * @param $formData
     * @param $id
     */
    public function updateService($formData,$id){
          $this::where('id',$id)->update($formData);
    }
}
