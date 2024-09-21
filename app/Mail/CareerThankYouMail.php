<?php

namespace App\Mail;

use App\Models\Career;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class CareerThankYouMail extends Mailable
{
    use Queueable, SerializesModels;
    public $career;
    /**
     * Create a new message instance.
     */
    public function __construct(Career $career)
    {
        $this->career = $career;
    }

    public function build()
    {
        return $this->subject('Thank You for Your Submission')
                    ->view('emails.career_thank_you')
                    ->with('career', $this->career);
    }


}
