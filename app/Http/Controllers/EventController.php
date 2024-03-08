<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function allEvantAffichage(){
        return view('all-event');
    }
    public function evantDetailleAffichage(){
        return view('event-detaille');
    }

    public function createEvent(){
        return view('organisateur-pages.creat-event');
    }

    public function meEvents(){
        return view('organisateur-pages.me-events');
    }
    
}