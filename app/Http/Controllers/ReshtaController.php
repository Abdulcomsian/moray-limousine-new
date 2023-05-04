<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasicInfoRequest;
use App\Models\Reshta;
use App\Models\ReshtaMedia;

class ReshtaController extends Controller
{
    private $reshta ;
    private $reshtaMedia;
    public function __construct(Reshta $reshta, ReshtaMedia $reshtaMedia)
    {
        $this->reshta = $reshta;
        $this->reshtaMedia = $reshtaMedia;
    }

    public function addReshta(){
        return view('front-end.reshta.add-reshta');
    }


    public function storeReshta(BasicInfoRequest $request){
        $request->validated();
        $reshta_images = $request->reshta_images;
        $reshta = $this->reshta->createReshta($request->except('reshta_images'));
        $this->reshtaMedia->saveImages($reshta_images,$reshta['id']);
        return redirect('/my-rishty')->with('success','Your Reshta Is Added Successfully.');
    }

}
