<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        // create a new user
        // $user = new User();
        // $user->name = 'Osama';
        // $user->email = 'osamahu96@gmail.com';
        // $user->password = bcrypt('password');
        // $user->save();

        // $users = User::all();
        // dd($users);

        // User::where('id', 2)->delete();

        // User::where('id', 4)->update(['name'=>'Osama Ahmad']);

        return view('user');
    }
}
