<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard(){

        $statistiqueEventAccepted = Event::all()->where('status','refused')->count();
        $statistiqueEventPending = Event::all()->where('status','pending')->count();
        $statistiqueCategories = Category::all()->count();
        $statistiqueUsers = User::all()->count();
        return view('admin-pages.dashboard' ,compact('statistiqueCategories','statistiqueEventAccepted','statistiqueEventPending','statistiqueUsers'));
    }

    public function addCategories(){
        return view('admin-pages.add-category');
    }
   
    //_________________affichage Users_______________ 
    public function allUSers(){
        
        $allUsers = User::all();
        return view('admin-pages.allUsers',['allUsers' => $allUsers]);
    }


    // ________________banner User________________

    public function banneUsers($id){
        
        $banneUSers = User::findOrFail($id);
        $banneUSers->banned ='1';
        $banneUSers->save();
        return redirect()->route('users')->with('success','user banned successfuly');
    }
    // ________________debanne USer________________

    public function debanneUsers($id){
        
        $debanneUsers = User::findOrFail($id);
        if($debanneUsers->banned == '1'){
        $debanneUsers->banned = '0';
        $debanneUsers->save();
        return redirect()->route('users')->with('success','user debanned successfuly');
        }else{
            return redirect()->route('users')->with('success','this user is not banned for debanned');
        }
            
        
    }

    // ________________________destroy user_____________
    
    public function destroy($id) {
        $deleteUser = User::find($id);
        $deleteUser->delete();
        return redirect()->route('users')->with('success', 'user delete successfully');
    }
   
    
}