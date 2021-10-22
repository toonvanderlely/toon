<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Mollie;
use Mail;

class IdealController extends Controller
{

    public function redirect(Order $order)
    {

        if($order->payed == false)
        {
            //  $payment = Mollie::api()->payments()->create([
            //     "amount"      => [
            //         "currency" => "EUR",
            //         "value" => $order->amount
            //     ],
            //     "description" => "Scouting Rveer Winkel #" . $order->slug,
            //     "redirectUrl" => url('ideal/finish/' . $order->id),
            //     "method"      => 'ideal',
            //     "metadata"    => json_encode([
            //         'order_slug' => $order->slug
            //     ])
            // ]);

            // $order->mollie_id = $payment->id;
            // $order->save();

            // return redirect($payment->getCheckoutUrl());

            return redirect()->route('ideal.finish', $order);
        }

        return redirect()->back();

    }

    public function finish(Request $request, Order $order)
    {
        // $payment = Mollie::api()->payments()->get($order->mollie_id);

        // if ($payment->isPaid())
        // {
            $order->payed = true;
            $order->save();
            $request->session()->flash('status', ['success', 'Betaling gelukt!']);
        // }
		// elseif($payment->isOpen() || $payment->isPending())
		// {
		// 	$request->session()->flash('status', ['warning', 'Wacht nog op bevestiging van uw bank...']);
		// }
		// else
		// {
		// 	$request->session()->flash('status', ['danger', 'Betaling niet gelukt!']);
		// }

        Mail::to($order->email)->send(new \App\Mail\OrderPlaced($order));

		$request->session()->reflash();
        return redirect()->route('order.show', [$order, $order->slug]);
    }

    public function webhook(Order $order)
    {
    	$payment = Mollie::api()->payments()->get($payment->id);

        if ($payment->isPaid())
        {
            $order->payed = true;
            $order->save();
        }
        else
        {
            $order->payed = false;
            $order->save();
        }

    	return response('Done', 200);
    }
}
