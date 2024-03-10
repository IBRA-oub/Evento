<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;
use Carbon\Carbon;
class ReservationController extends Controller
{
    // ____________________create reservation_________________
    
    public function createReservation(Request $request){
        $eventId = $request->input('event_id'); 
        $event = Event::findOrFail($eventId);
        if($request->type_validation == 'auto'){
        $creatReservation = new Reservation;
        $creatReservation->your_place = $event->places_available;
        $creatReservation->event_id = $eventId;
        $creatReservation->user_id = $request->input('user_id');
        $creatReservation->status = 'accepted';
            
        $event->places_available--;
        $event->save();
        $creatReservation->save();
        
        return redirect()->route('all-event')->with('success', 'your reserved successfully');

        
        }elseif($request->type_validation == 'manu'){
            $creatReservation = new Reservation;  
            $creatReservation->your_place = $event->places_available;
            $creatReservation->event_id = $eventId;
            $creatReservation->user_id = 1;
            $creatReservation->status = 'pending';
            $creatReservation->save();

            return redirect()->route('all-event')->with('success', 'your reservtion is pending');
        }
    }

    // ________________________affichage des reservation pour client__________________
    
        public function clientReservation(){
            $clientReservation = Reservation::all()->where('user_id',auth()->user()->id);
            
            return view('client-pages.client-reservation',['clientReservation'=>$clientReservation]);
        }
        
     // ________________________affichage des reservation pour client__________________
    
        public function clientTichketsAffichage(){
            $clientTikeckt = Reservation::all()->where('user_id',auth()->user()->id);
            
            
            return view('client-pages.client-tickets',['clientTikeckt'=>$clientTikeckt]);
        }
}