<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\EmailTemplate;
use Exception;
use Illuminate\Http\Request;
use Mail;
// use Symfony\Component\Mime\Part\HtmlPart;
use Symfony\Component\Mime\Part\TextPart;
use Symfony\Component\Mime\Part\HtmlPart;
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
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Check if the combination of email and phone already exists
        $existingContact = Contact::where('email', $request->email)
            ->where('phone', $request->phone)
            ->first();

        if ($existingContact) {
            return back()->with('error', 'This combination of email and phone number already exists.');
        }

        try {
            // Send email to admin
            Mail::send('emails.contact', ['data' => $validatedData], function($message) use ($validatedData) {
                $message->to('abbas.uddin@ronakoptik.com') // Admin email
                        ->from('info@ronakoptik.com', 'Ronak Optik India Pvt. Ltd.')
                        ->subject('New Contact Form Submission from ROIPL Website');
            });

            // Send acknowledgment email to the user
            $userEmailData = [
                'name' => $validatedData['name'],
            ];

            Mail::send('emails.user_acknowledgment', $userEmailData, function($message) use ($validatedData) {
                $message->to($validatedData['email']) // User's email
                        ->from('info@ronakoptik.com', 'Ronak Optik India Pvt. Ltd.')
                        ->subject('Thank you for reaching out to ROIPL!');
            });

            // Save contact to the database
            Contact::create($validatedData);

            return back()->with('success', 'Your message has been sent successfully.');

        } catch (Exception $e) {
            \Log::error('Mail send failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }



    // public function savecontact(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'phone' => 'required|string|max:15',
    //         'email' => 'required|email|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     $existingContact = Contact::where('email', $request->email)
    //         ->where('phone', $request->phone)
    //         ->first();

    //     if ($existingContact) {
    //         return back()->with('error', 'This combination of email and phone number already exists.');
    //     }

    //     try {
    //         // Fetch templates from the database
    //         $adminTemplate = EmailTemplate::where('name', 'contact_admin')->first();
    //         $userTemplate = EmailTemplate::where('name', 'contact_user_acknowledge')->first();

    //         if (!$adminTemplate || !$userTemplate) {
    //             return back()->with('error', 'Email templates are not configured.');
    //         }

    //         // Replace placeholders in the templates
    //         $adminEmailBody = str_replace(
    //             ['{{ $data["name"] }}', '{{ $data["message"] }}'],
    //             [$validatedData['name'], $validatedData['message']],
    //             $adminTemplate->body
    //         );

    //         $userEmailBody = str_replace(
    //             ['{{ $data["name"] }}'],
    //             [$validatedData['name']],
    //             $userTemplate->body
    //         );

    //         // Send email to admin
    //         Mail::send([], [], function ($message) use ($adminTemplate, $adminEmailBody) {
    //             $message->to('abbas.uddin@ronakoptik.com')
    //                     ->from('info@ronakoptik.com', 'Ronak Optik India Pvt. Ltd.')
    //                     ->subject($adminTemplate->subject)
    //                     ->setBody(new HtmlPart($adminEmailBody));
    //         });

    //         // Send acknowledgment email to the user
    //         Mail::send([], [], function ($message) use ($userTemplate, $userEmailBody, $validatedData) {
    //             $message->to($validatedData['email'])
    //                     ->from('info@ronakoptik.com', 'Ronak Optik India Pvt. Ltd.')
    //                     ->subject($userTemplate->subject)
    //                     ->setBody(new HtmlPart($userEmailBody));
    //         });

    //         Contact::create($validatedData);

    //         return back()->with('success', 'Your message has been sent successfully.');
    //     } catch (Exception $e) {
    //         Log::error('Mail send failed: ' . $e->getMessage());
    //         return back()->with('error', 'Something went wrong. Please try again.');
    //     }
    // }



}
