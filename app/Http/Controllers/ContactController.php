<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'full_name' => 'required|string',
                'email' => 'required|string|email',
                'phone_number' => 'required|string',
                'subject_of_review' => 'required|string',
                'review_body' => 'required|string',
            ]);

            Contact::create($request->all());

            $confirmation = ['Thank you! Your review has been sent to our team.'];
            $error = false;
            return view('contact')->with(['confirmation' => $confirmation, 'error' => $error]);
        } else {
            return view('contact');
        }
    }
}
