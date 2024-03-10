<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;

class OrganisateurController extends Controller
{
    public function dashboard()
    {
        $statistiqueEventRefused = Event::where('user_id', auth()->user()->id)
        ->where('status','refused')->count();
        
        $statistiqueEventAccepetd = Event::where('user_id', auth()->user()->id)
        ->where('status','accepted')->count();
        
        $userEvents = Event::where('user_id', auth()->user()->id)->get();
        $statistiqueReservationPending = 0;
    
        foreach ($userEvents as $event) {
            $tickets = Reservation::where('event_id', $event->id)
                ->where('status', 'pending')
                ->count();
            
            $statistiqueReservationPending += $tickets;
        }


        $userEvents = Event::where('user_id', auth()->user()->id)->get();
        $statistiqueReservationAccepted = 0;
    
        foreach ($userEvents as $event) {
            $tickets = Reservation::where('event_id', $event->id)
                ->where('status', 'accepted')
                ->count();
            
            $statistiqueReservationAccepted += $tickets;
        }
        
        return view('organisateur-pages.dashboard', compact('statistiqueEventRefused','statistiqueEventAccepetd','statistiqueReservationPending','statistiqueReservationAccepted'));
    }

   
  
   
}