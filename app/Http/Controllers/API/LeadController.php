<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadMarkdown;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        //validate
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            //return a error
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        //create the lead inside the database
        $newLead = Lead::create($request->all());

        //send email
        Mail::to('admin@fotoalbum.com')->send(new NewLeadMarkdown($newLead));


        return response()->json([
            'success' => true
        ]);
    }
}
