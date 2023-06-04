<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data = [];

    /**
     * Create a new message instance.
     */
    public function __construct(Array $user)
    {
        $this->data = $user;
    }

    public function build()
    {
        return $this->from('meryemennajibi123@gmail.com')
                    ->subject('Reset password link ')
                    ->view('emails.reset');
    }
}
