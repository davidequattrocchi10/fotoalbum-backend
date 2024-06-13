<?php

namespace App\Http\Controllers;

use App\Mail\NewLeadMarkdown;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function create()
    {
        return view('guests.contacts.create');
    }

    public function store(Request $request)
    {

        // dd($request);
        //validate
        $val_data = $request->validate([
            'name' => 'required',
            'address' => 'required|email',
            'message' => 'required|max:2000',
        ]);

        // dd($val_data);


        //create
        $newLead = Lead::create($val_data);


        //send email
        Mail::to('admin@fotoalbum.com')->send(new NewLeadMarkdown($newLead));

        //send email
        return  back()->with('message', 'Message sent successfully');
    }
}
