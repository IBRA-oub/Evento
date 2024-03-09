<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    // ____________________create reservation_________________
    
    public function createReservation(Request $request){
        
        if($request->type_validation == 'auto'){
        $creatReservation = new Reservation;
        $creatReservation->event_id = $request->input('event_id');
        $creatReservation->user_id = 1;
        $creatReservation->status = 'accepted';
            
        $creatReservation->save();
        
        return redirect()->route('all-event')->with('success', 'your reserved successfully');

        
        }elseif($request->type_validation == 'manu'){
            $creatReservation = new Reservation;  
            $creatReservation->event_id = $request->input('event_id');
            $creatReservation->user_id = 1;
            $creatReservation->status = 'pending';
            $creatReservation->save();

            return redirect()->route('all-event')->with('success', 'your reservtion is pending');
        }
    }
}