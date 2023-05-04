<?php

namespace App\Http\Controllers;
use App\Http\Requests\BasicInfoRequest;

class BasicInfoController extends Controller
{
     public function storeInfo(BasicInfoRequest $request){
         $request->validated();
        //  dd($request->all());
     }
}
