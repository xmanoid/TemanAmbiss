<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index(){
        return view('dashboard.users', [
            'users' => User::all()
        ]);
    }
    public function addUser(){
        return view('dashboard.userAdd',[
            'title' => 'Dashboard | Teman Ambis',
        ]);
    }

    public function addUserSubmit(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        switch ($request->user_type) {
            case '1':
                $user->user_type = 'Administrator';
                break;
            case '2':
                $user->user_type = 'User';
                break;
        }
        $user->save();
        return redirect('/admin/users');
    }

    public function editUser(User $user){
        return view('dashboard.userEdit',[
            'title' => 'Dashboard | Teman Ambis',
            'user' => $user
        ]);
    }
    public function editUserSubmit(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        switch ($request->user_type) {
            case '1':
                $user->user_type = 'Administrator';
                break;
            case '2':
                $user->user_type = 'User';
                break;
        }
        $user->save();
        return redirect('/admin/users');
    }

    public function deleteUser($id){
        User::where('id', $id)->delete();
        return redirect('/admin/users');
    }


    public function addEvent(User $user){
        return view('dashboard.eventAdd',[
            'title' => 'Dashboard | Teman Ambis',
            'user' => $user
        ]);
    }
    public function addEventSubmit(Request $request){
        $non = strtolower($request->title);
        $slug_arr = preg_split('/\s+/', $non);
        $slug = $slug_arr[0] . $slug_arr[1];

        $event = new Event;
        $event->title = $request->title;
        $event->slug = $slug;
        $event->desc = $request->desc;
        $event->user_id = $request->user_id;
        $event->save();
        return redirect('/admin/event');
    }
    public function editEvent(Event $event){
        return view('dashboard.eventEdit',[
            'title' => 'Dashboard | Teman Ambis',
            'event' => $event
        ]);
    }
    public function editEventSubmit(Request $request){
        $non = strtolower($request->title);
        $slug_arr = preg_split('/\s+/', $non);
        $slug = $slug_arr[0] . $slug_arr[1];

        $event = Event::find($request->event_id);
        $event->title = $request->title;
        $event->slug = $slug;
        $event->desc = $request->desc;
        $event->save();
        return redirect('/admin/event');
    }

    public function deleteEvent($id){
        Event::where('id', $id)->delete();
        return redirect('/admin/event');
    }
}
