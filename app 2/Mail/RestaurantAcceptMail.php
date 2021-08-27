<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RestaurantAcceptMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $restaurant_block;

    public function __construct($restaurant_details)
    {
        $this->restaurant_details = $restaurant_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), 'Dinz')
            ->subject('Restaurant Approved')
            ->view('admin.email.restaurant-accept-mail')
            ->with([
                'restaurant_details'   => $this->restaurant_details,
                'logo'   => public_path('app_icon.png')
            ]);
    }
}