<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReshtaMedia extends Model
{
    protected $fillable = ['reshta_id','image','is_public'];



   public function saveImages($imagesArray,$id){
      if ($imagesArray){
          foreach ($imagesArray as $image){
              $img_name = time() . $image->getClientOriginalName();
              $image->move(public_path('images/reshta_images'), $img_name);
            //Save images in Database
              $this->create([
                  'reshta_id'=> $id,
                  'image' =>   $img_name,
                  'is_public'=> true
              ]);
          }
      }



   }

}
