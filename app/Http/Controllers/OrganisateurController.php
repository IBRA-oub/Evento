<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function dashboard(){
        return view('organisateur-pages.dashboard');
    }

    public function confirmationTickets(){
        return view('organisateur-pages.confirmation-tickets');
    }

   
}