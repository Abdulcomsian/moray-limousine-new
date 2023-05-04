<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{


    public function index(){
        return view('changePassword');
    }


    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->id())->update(['password'=> Hash::make($request->new_password)]);

       return redirect()->route('admin.change.password')->with('success','Success ..! Password Is Changed Successfully !');
    }
}
