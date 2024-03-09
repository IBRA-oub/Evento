<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin-pages.dashboard');
    }

   

    public function allUSers(){
        return view('admin-pages.allUsers');
    }

    public function addCategories(){
        return view('admin-pages.add-category');
    }

   
}