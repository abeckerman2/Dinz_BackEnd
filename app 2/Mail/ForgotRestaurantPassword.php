<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotRestaurantPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $is_email_exist , $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($is_email_exist , $link)
    {
        $this->is_email_exist = $is_email_exist;
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
        ->subject('Forgot Password')
        ->view('restaurant/email/restaurant_forgot_password')
        ->with([
            'is_email_exist' => $this->is_email_exist,
            'link' => $this->link,
            // 'logo' => url('public/restaurant/assets/img/andrewlogo.png')
        ]);
    }
}
