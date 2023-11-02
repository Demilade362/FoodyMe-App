<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        $productName = $request->product_name;
        $totalPrice = $request->price * 100;
        $quantity = $request->quantity;
        $productImage = $request->image_url;

        $stripe = new \Stripe\StripeClient(config('stripe.sk'));

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $productName,
                        'images' => [$productImage]
                    ],
                    'unit_amount' => (int) $totalPrice
                ],
                'quantity' => $quantity,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('home'),
        ]);

        return redirect()->away($checkout_session->url);
    }

    public function success()
    {
        return redirect()->route('home')->with('msg', "Payment Successful Order is on it's way");
    }
}
