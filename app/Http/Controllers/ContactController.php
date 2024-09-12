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
        // Validate form inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Send the email
            // Mail::send('emails.contact', ['data' => $validatedData], function($message) use ($validatedData) {
            //     $message->to('abbasbitm3655@gmail.com') // Update this to your email
            //             ->subject('New Contact Form Submission');
            // });

            // Optionally, save the data to the database
            Contact::create($validatedData);
            //dd('success');
            // Return a success response
            return back()->with('success', 'Your message has been sent successfully.');


        } catch (Exception $e) {
            echo $e->getMessage();
            \Log::error('Mail send failed: '.$e->getMessage());
            die;
            // Handle the error if email sending fails
            //return back()->with('error', 'There was an error sending your message: ' . $e->getMessage());
        }
    }
}
