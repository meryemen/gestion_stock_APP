<?php

namespace App\Mail;

use App\Http\Controllers\TestController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
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
                    ->subject('Données d\'authentifications')
                    ->view('emails.test');
    }

   
}
