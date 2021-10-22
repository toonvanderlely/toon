<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderReady extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    private $pickup;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $pickup)
    {
        $this->order = $order;
        $this->pickup = $pickup;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Scouting Raamsdonksveer - Bestelling ligt klaar')
            ->replyTo('winkelbeheer@scoutingrveer.nl', 'Winkelbeheerder')
            ->view('emails.orderready')
            ->with('order', $this->order)
            ->with('pickup', $this->pickup);
    }
}
