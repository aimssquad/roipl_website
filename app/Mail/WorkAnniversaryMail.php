<?php

namespace App\Mail;

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

    public function __construct($employee, $years)
    {
        $this->employee = $employee;
        $this->years = $years;
    }

    public function build()
    {
        return $this->subject('🎉 Happy Work Anniversary!')
                    ->view('emails.work_anniversary');
    }
}
