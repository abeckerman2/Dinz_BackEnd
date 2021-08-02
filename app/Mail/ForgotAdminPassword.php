<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotAdminPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link)
    {
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
        ->subject('Forgot Password link')
        ->view('admin.email.admin-forgot-password')
        ->with([
            'link'   => $this->link,
            'logo'   => public_path('app_icon.png'),
        ]);
    }
}
