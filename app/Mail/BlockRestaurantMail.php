<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlockRestaurantMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $restaurant_block,$text_message;

    public function __construct($restaurant_block,$text_message)
    {
        $this->restaurant_block = $restaurant_block;
        $this->text_message = $text_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), 'Dinz')
            ->subject('Restaurant Block')
            ->view('admin.email.block-restaurant-mail')
            ->with([
                'restaurant_block'   => $this->restaurant_block,
                'text_message'   => $this->text_message,
                'logo'   => public_path('app_icon.png')
            ]);
    }
}