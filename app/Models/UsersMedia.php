<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersMedia extends Model
{
   protected $fillable = ['user_id','image_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   public function user(){
       return $this->belongsTo(User::class);
   }



    /**
     * @param $image_name
     * @param $id
     */
    public function saveUserImage($image_name,$id){
       $data = ['user_id' => $id , 'image_name' => $image_name];
       $this::create($data);
    }

    /**
     * @param $image_name
     * @param $id
     */
    public function updateUserImage($image_name,$id){
       $data = ['user_id' => $id , 'image_name' => $image_name];
       $this::where('user_id',$id)->update($data);
       $this::update($data);
    }

}
