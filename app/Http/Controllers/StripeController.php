<?php

namespace App\Http\Controllers;

use App\Events\Order;
use App\Http\Requests\StripeRequest;
use App\Models\Order as ModelsOrder;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class StripeController extends Controller
{
    public function getEmail()
    {
        return auth()->user()->email;
    }

    public function session(StripeRequest $request)
    {
        $request->validated();

        session()->put('checkout_session_created', true);

        return $this->createCheckoutSession($request);
    }

    public function cartSession(Request $request)
    {
        session()->put('checkout_session_created', true);

        return $this->createCartCheckoutSession($request);
    }

    public function success(Request $request)
    {
        if (!session()->has('checkout_session_created')) {
            abort(403);
        }
        if (Route::getCurrentRoute()->action['as'] == 'success') {
            event(new Order(auth()->user(), session('name'), session('quantity')));
        }

        CartFacade::clear();

        session()->forget('checkout_session_created');

        return redirect()->route('home')->with('msg', "Payment Successful Order is on it's way");
    }

    public function createCheckoutSession(StripeRequest $request)
    {
        $request->validated();

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
                    'unit_amount' => $totalPrice
                ],
                'quantity' => $quantity,
            ]],
            'mode' => 'payment',
            'customer_email' => $this->getEmail(),
            'success_url' => route('success'),
            'cancel_url' => route('products.show', [
                'product' => $request->id
            ]),
        ]);

        return redirect()->away($checkout_session->url)->with('name', $productName)->with('quantity', $quantity)->with('price', $request->price)->with('group_order');
    }

    public function createCartCheckoutSession(Request $request)
    {
        $productItems = [];
        $value = CartFacade::getContent();
        foreach ($value as $item) {
            $name = $item['name'];
            $price = $item['price'] * 100;
            $quantity = $item['quantity'];

            $stripe = new \Stripe\StripeClient(config('stripe.sk'));

            $productItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $name,
                    ],
                    'unit_amount' => $price
                ],
                'quantity' => $quantity,
            ];
            $checkout_session = $stripe->checkout->sessions->create([
                'line_items' => [$productItems],
                'mode' => 'payment',
                'customer_email' => $this->getEmail(),
                'success_url' => route('success'),
                'cancel_url' => route('cart.list'),
            ]);
        }

        return redirect()->away($checkout_session->url);
    }

    public function webhook(Request $request)
    {
        if ($request->type === 'charge.succeeded') {
            try {
                ModelsOrder::create();
            } catch (\Exception $e) {
                abort(419, $e->getMessage());
            }
        }
    }
}
