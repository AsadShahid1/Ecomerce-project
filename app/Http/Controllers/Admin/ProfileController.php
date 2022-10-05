<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data['main_title'] = "Profile Management";
        $data['sub_title'] = "Profile Details";
       return view('admin.profile.index')->with($data);
    }
}
