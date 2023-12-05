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
                'name' => 'required|string',
                'email' => 'required|string|email',
                'phone' => 'required|string',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);

            $full_name = $request->input('name');
            $email = $request->input('email');
            $phone_number = $request->input('phone');
            $subject_of_review = $request->input('subject');
            $review_body = $request->input('message');

            Contact::create([
                'full_name' => $full_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'subject_of_review' => $subject_of_review,
                'review_body' => $review_body,
            ]);

            $confirmation = ['Thank you! Your review has been sent to our team.'];
            $error = false;
            return view('contact', ['confirmation' => $confirmation, 'error' => $error]);
        } else {
            return view('contact');
        }
    }
}
