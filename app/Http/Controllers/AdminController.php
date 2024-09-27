<?php

namespace App\Http\Controllers;

use App\Mail\AdminTicketMail;
use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function update_ticket($id){
        // $ticket = ticket::findOrFail($id);
        ticket::where('id',$id)->update([
            'status' => 'Done',
        ]);

        $data = ticket::find($id);
        $toMailAddress = "customer@gmail.com";
        $ticketTopic = $data->title;
        Mail::to($toMailAddress)->send(new AdminTicketMail($ticketTopic));
        return redirect()->back();
    }
}
