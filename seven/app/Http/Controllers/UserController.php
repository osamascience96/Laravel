<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        $data = [
            'name' => 'Elon',
            'email' => 'elon96@gmail.com',
            'password' => 'password',
        ];

        // User::create($data);

        // create a new user
        // $user = new User();
        // $user->name = 'Osama';
        // $user->email = 'osamahu96@gmail.com';
        // $user->password = bcrypt('password');
        // $user->save();

        $users = User::all();
        return $users;

        // User::where('id', 2)->delete();

        // User::where('id', 4)->update(['name'=>'Osama Ahmad']);

        return view('user');
    }

    public function uploadAvatar(Request $request){
        if($request->hasFile('image')){
            User::uploadAvatar($request->image);
            // session()->put('success_message', 'Image Uploaded');
            //$request->session()->flash('success_message', 'Image Uploaded');
            redirect()->back()->with('success_message', 'Image Uploaded');
        }else{
            //$request->session()->flash('error_message', 'Image not Uploaded');
        }

        return redirect()->back()->with('error_message', 'Image not Uploaded');
    }
}
