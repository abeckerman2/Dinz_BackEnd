<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderDetail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($restaurant_details , $is_order,  $payment , $menu_order_details)
    {
        $this->restaurant_details = $restaurant_details;
        $this->is_order = $is_order;
        $this->payment = $payment;
        $this->menu_order_details = $menu_order_details;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from(env('MAIL_USERNAME'), 'Dinz')
            ->subject('Order Details')
            ->view('website/order-details-template')
            ->with([
                'restaurant_details'   => $this->restaurant_details,
                'is_order'   => $this->is_order,
                'payment'   => $this->payment,
                'menu_order_details'   => $this->menu_order_details,
                'logo'   => public_path("website/payment_invoice/assets/logo.png"),
            ]);
    }
}
