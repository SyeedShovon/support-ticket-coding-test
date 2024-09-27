<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            $usertype = Auth::user()->usertype;
            $data = User::find(Auth::id());
            if($usertype == "user"){
                $ticket = ticket::all()->sortByDesc('id');
                return view("user.index",compact('data','ticket'));
            }elseif($usertype == "admin"){
                $ticket = ticket::all()->sortByDesc('id');
                return view("admin.index",compact('data','ticket'));
            }
        }
    }
}
