<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserVerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data, $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $link)
    {
        $this->data = $data;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

            return $this->from(env('MAIL_USERNAME'), 'Dinz')
               ->subject('Verify Email Link')
               ->view('emails.confirm-account')
               ->with([
                   'data'   => $this->data,
                   'link'   => $this->link,
                   'logo'   => public_path('app_icon.png')
           ]);

    }
}
