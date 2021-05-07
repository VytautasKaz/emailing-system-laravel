<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTemplate extends Mailable
{
    use Queueable, SerializesModels;

    public $recipientName;
    public $subject;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recipient, $subject, $content)
    {
        $this->recipientName = $recipient;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('<placeholder@email.com>', 'example')->subject($this->subject)->view('mail.emailTemplate', ['recipient_username' => $this->recipient, ['mail_content' => $this->content]]);
    }
}
