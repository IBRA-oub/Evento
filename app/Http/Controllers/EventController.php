<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function allEvantAffichage(){
        return view('all-event');
    }
    public function evantDetailleAffichage(){
        return view('event-detaille');
    }

    

   
    public function editEvent(){
        return view('organisateur-pages.edit-event');
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
        $event->user_id = 1;
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

    // _______________________mes events___________________

    public function meEvents(){
        $events = Event::all();

        return view('organisateur-pages.me-events',['events' => $events]);
        
    }
    
}