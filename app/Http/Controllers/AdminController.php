<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function allMembers()
    {
        return view('admin.members.all-members');
    }
    public function allReshty()
    {
        return view('admin.manage-reshty.all-reshty');
    }
    
    public function allHappyStories()
    {
        return view('admin.all-happy-stories');
    }
}
