<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Scouting Raamsdonksveer - Bestelling geplaatst')
            ->replyTo('winkelbeheer@scoutingrveer.nl', 'Winkelbeheerder')
            ->view('emails.orderplaced')
            ->with('order', $this->order);
    }
}
