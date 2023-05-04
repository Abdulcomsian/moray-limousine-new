<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraOptions extends Model
{
    protected $table = 'extraoptions';
    protected $fillable = ['title','price','description','is_active','max_quantity',
        'image_name','category_id'];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany('App\VehicleCategory', 'optionscategories', 'extraOption_id', 'vehicleCategory_id')->withTimestamps();
    }
}
