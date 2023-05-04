<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table= 'build_profile';
    protected $fillable =['display_name','tag_line','phone_number','email','more','about_me','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
      return  $this->hasOne(User::class);
    }

    /**
     * @param $form_data
     */
    public function createProfile($form_data){
        $this->create($form_data);
    }

    /**
     * @param $form_data
     * @param $id
     */
    public function updateProfile($form_data, $id){
        $this->where('id',$id)->update($form_data);
    }


}
