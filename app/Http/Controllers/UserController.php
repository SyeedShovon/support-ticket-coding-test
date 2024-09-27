<?php

namespace App\Http\Controllers;
use App\Mail\TicketMail;
use App\Models\User;
use App\Models\ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function add_ticket(){
        if(Auth::id()){
            $usertype = Auth::user()->usertype;
            $data = User::find(Auth::id());
            // dd($data->name);
            if($usertype == "user"){
                return view("user.add_ticket",compact('data'));
            }elseif($usertype == "admin"){
                return view("user.add_ticket",compact('data'));
            }
        }
    }

    public function ticket_entry(Request $request){
        if(Auth::id()){
            // $customer_name = Auth::user()->name;
            $data = User::find(Auth::id())->name;

            ticket::create([
                'customer_name' => $data,
                'priority' => $request->priority,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $toMailAddress = "admin@gmail.com";
            $ticketTopic = $request->title;
            Mail::to($toMailAddress)->send(new TicketMail($ticketTopic));
            
            return redirect()->back();
        }
    }
}
