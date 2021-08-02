<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlockUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $user_block,$text_message;

    public function __construct($user_block,$text_message)
    {
        $this->user_block = $user_block;
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
            ->subject('User Block')
            ->view('admin.email.block-user-mail')
            ->with([
                'user_block'   => $this->user_block,
                'text_message'   => $this->text_message,
                'logo'   => public_path('app_icon.png')
            ]);
    }
}