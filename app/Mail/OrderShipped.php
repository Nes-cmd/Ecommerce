<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message = [];
    public $order;
    public function __construct($order ,$message)
    {
        $this->order = $order;
        $this->message['message'] = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('service@warka.com')
                    ->markdown('emails.orders.shipped', ['data' => $this->message]);
    }
}
