<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;


class EventController extends Controller
{
    public function allEvantAffichage(){
        return view('all-event');
    }
    public function evantDetailleAffichage(){
        return view('event-detaille');
    }

    
    // _____________________creat event/store ________________

    public function storeEvent(Request $request){
       
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'location'=> 'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'date'=> 'required',
            'places_available'=>'required',
            'type_validation'=>'required',
            'category_id'=>'required'
        ]);

       
        
        $event= new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->places_available = $request->input('places_available');
        $event->type_validation = $request->input('type_validation');
        $event->category_id = $request->input('category_id');
        $event->user_id = 2;
        $event->status = 'pending';
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/image', $imageName);
            $event->image = $imageName;
        }
        $event->save();

        
        return redirect()->route('me-events')->with('success', 'event add successfully');
    }

    // _______________________mes events organisateur___________________

    public function meEvents(){
        $events = Event::all();

        return view('organisateur-pages.me-events',['events' => $events]);
        
    }

    // __________________edit page event organisateur_________________
    
    public function editEvent($id){
        $categories = Category::all();
        $event = Event::findOrFail($id);
        return view('organisateur-pages.edit-event',['event' => $event ,'categories' => $categories]);
    }

    // ____________________update event organisateur________________
    public function updateEvent(Request $request,$id){
       
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'location'=> 'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'date'=> 'required',
            'places_available'=>'required',
            'type_validation'=>'required',
            'category_id'=>'required'
        ]);

       
        
        $updateEvent= Event::findOrFail($id);
        $updateEvent->title = $request->input('title');
        $updateEvent->description = $request->input('description');
        $updateEvent->location = $request->input('location');
        $updateEvent->date = $request->input('date');
        $updateEvent->places_available = $request->input('places_available');
        $updateEvent->type_validation = $request->input('type_validation');
        $updateEvent->category_id = $request->input('category_id');
        $updateEvent->user_id = 1;
        $updateEvent->status = 'pending';
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/image', $imageName);
            $updateEvent->image = $imageName;
        }
        $updateEvent->save();

        
        return redirect()->route('me-events')->with('success', 'event update successfully');
    }

    // ____________________confirmation event/ admin_________________

    public function confirmationEventPage(){

        $pendingEvent = Event::all()->where('status','pending');
       
        return view('admin-pages.confirmation-event',['pendingEvent'=>$pendingEvent]);
    }


    // ______________________accepted event/ update status_____________


    public function acceptedEvent($id){
       

       
        
        $acceptedEvent= Event::findOrFail($id);
        $acceptedEvent->status = 'accepted';
        $acceptedEvent->save();

        
        return redirect()->route('confirmation-event')->with('success', 'event accepted successfully');
    }


    // ______________________refused event/ update status_______________

      public function refusedEvent($id){
       

       
        
        $refusedEvent= Event::findOrFail($id);
        $refusedEvent->status = 'accepted';
        $refusedEvent->save();

        
        return redirect()->route('confirmation-event')->with('error', 'event refused successfully');
    }
}