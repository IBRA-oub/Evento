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

    // __________________edit page event_________________
    
    public function editEvent($id){
        $categories = Category::all();
        $event = Event::findOrFail($id);
        return view('organisateur-pages.edit-event',['event' => $event ,'categories' => $categories]);
    }

    // ____________________update event________________
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

}