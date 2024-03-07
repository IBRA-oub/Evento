<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clientTichketsAffichage(){
        return view('client-pages.client-tickets');
    }
}