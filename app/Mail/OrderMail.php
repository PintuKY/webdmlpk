<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'info@corg.com';
        $name = 'Order Details';
        $order_id = $this->data['order_id'];
        $subject = "Order Details - SubbiSky";

        return $this->view('mail.order',compact('order_id'))
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}
