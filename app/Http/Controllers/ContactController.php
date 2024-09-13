<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function contact(Request $request){
        return view($this->prefix.'contact');

    }



    public function savecontact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $existingContact = Contact::where('email', $request->email)
        ->where('phone', $request->phone)
        ->first();

        if ($existingContact) {
            return back()->with('error', 'This combination of email and phone number already exists.');
        }

        try {
            // Send the email
            Mail::send('emails.contact', ['data' => $validatedData], function($message) use ($validatedData) {
                $message->to('abbasbitm3655@gmail.com') // Update this to your email
                        ->subject('New Contact Form Submission');
            });

            Contact::create($validatedData);
            return back()->with('success', 'Your message has been sent successfully.');


        } catch (Exception $e) {
            echo $e->getMessage();
            \Log::error('Mail send failed: '.$e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
