<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WorkAnniversaryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    public $years;
    public $body;
    public $subject;



    public function __construct($employee, $years)
    {
        $this->employee = $employee;
        $this->years = $years;

        // Fetch template from DB by slug
        $template = EmailTemplate::where('slug', 'work-anniversary')->first();

        // Default fallback if DB doesn't have it
        $this->subject = $template->subject ?? 'Happy Work Anniversary!';
        $this->body = $template->body ?? "Congratulations {$employee->name}, on completing {$years} year(s) with us!";
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.work_anniversary')
                    ->with([
                        'employee' => $this->employee,
                        'years' => $this->years,
                        'subject' => $this->subject,
                        'body' => $this->body,
                    ]);
    }
}
