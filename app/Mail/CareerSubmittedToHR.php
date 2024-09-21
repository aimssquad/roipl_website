<?php

namespace App\Mail;

use App\Models\Career;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerSubmittedToHR extends Mailable
{
    use Queueable, SerializesModels;

    public $career;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Career $career
     */
    public function __construct(Career $career)
    {
        $this->career = $career;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Career Submission')
                    ->view('emails.career_submitted_to_hr')
                    ->with('career', $this->career);
    }
}
