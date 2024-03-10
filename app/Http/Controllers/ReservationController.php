<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;

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
        $creatReservation->user_id = auth()->user()->id;
        $creatReservation->status = 'accepted';
            
        $event->places_available--;
        $event->save();
        $creatReservation->save();
        
        return redirect()->route('all-event')->with('success', 'your reserved successfully');

        
        }elseif($request->type_validation == 'manu'){
            $creatReservation = new Reservation;  
            $creatReservation->your_place = $event->places_available;
            $creatReservation->event_id = $eventId;
            $creatReservation->user_id = auth()->user()->id;
            $creatReservation->status = 'pending';

            $event->places_available--;
            $event->save();
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
            $clientTikeckt = Reservation::all()->where('user_id',auth()->user()->id)
            ->where('status','accepted');
            
            
            return view('client-pages.client-tickets',['clientTikeckt'=>$clientTikeckt]);
        }
       
        // ________________________affichage des reservation pending/organisateur__________________
    
        public function confirmationTickets()
        {
            $userEvents = Event::where('user_id', auth()->user()->id)->get();
            $confirmationTickets = [];
        
            foreach ($userEvents as $event) {
                $tickets = Reservation::where('event_id', $event->id)
                ->where('status','pending')
                ->get();
                $confirmationTickets[$event->id] = $tickets;
                
            }
           
        
            return view('organisateur-pages.confirmation-tickets', compact('confirmationTickets'));
        }

        // ____________________accepte reservation_______________________

        public function acceptedReservation($id){
           
            $acceptedReservation= Reservation::findOrFail($id);
            $acceptedReservation->status ='accepted';
            $acceptedReservation->save();
    
            
            return redirect()->route('confirmation-tickets')->with('success', 'reservation accepted successfully');
        }
        
        // ____________________refuse reservation________________________

        public function refusedReservation($id,$eventId){
            
            $event = Event::findOrFail($eventId);
            $refusedReservation= Reservation::findOrFail($id);
            $refusedReservation->status = 'refused';

            $event->places_available++;
            $event->save();
            $refusedReservation->save();
    
            
            return redirect()->route('confirmation-tickets')->with('error', 'reservation refused successfully');
        }
        // ___________________cancel reservation________________________

        public function destroy($id,$eventId) {
            $event = Event::findOrFail($eventId);
            $event->places_available++;
            $event->save();
            
            $deleteReservation = Reservation::findOrFail($id);
            $deleteReservation->delete();
            return redirect()->route('client-reservation')->with('success', 'reservation canceled successfully');
        }

}