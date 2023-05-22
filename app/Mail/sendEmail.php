<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function index()
    {
        return view('send-mail');
    }

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData)
    {
        $this->mailData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        $subject = $this->mailData['subject'];
		$replyToName = 'No-reply';
		$replyTo = $this->mailData['email'];
        $body = $this->mailData['body'];
		
		return $this->view('emails.send-mail')->cc($replyTo, $replyToName)->subject($subject)->replyTo($replyTo, $replyToName)->with(['data' => $this->mailData]);
    }
}
