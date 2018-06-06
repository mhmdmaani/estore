<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProMail extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $body;
    public $sender;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$sender,$body)
    {
        $this->title=$title;
        $this->sender=$sender;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@estore.com')->view('mails.productmail');
    }
}
