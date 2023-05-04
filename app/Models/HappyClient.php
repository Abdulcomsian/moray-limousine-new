<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HappyClient extends Model
{
    protected $fillable = ['client_image','client_title'];

    /**
     * @param $form_data
     * @return mixed
     */
    public function createClient($form_data){
       return $this->create($form_data);
    }

    /**@param $id
     * @param $form_data
     */
    public function updateClient($form_data, $id){
        $this->where('id',$id)->update($form_data);
    }
}
