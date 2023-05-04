<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsHomePage extends Model
{
    protected $table = 'cms_home_page';
    protected $fillable = ['item_name', 'item_content'];

    static function getValueForKey($key)
    {
        $object = CmsHomePage::where('item_name', $key)->first();
        if ($object == null){
            return false;
        }else{
            return $object->item_content;
        }
    }
}
