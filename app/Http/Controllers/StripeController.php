<?php

namespace App\Http\Controllers;

use App\Events\Order;
use App\Http\Requests\StripeRequest;
use App\Models\Order as ModelsOrder;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class StripeController extends Controller
{

    public function getStripe()
    {
        return new \Stripe\StripeClient(config('stripe.sk'));
    }

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
            if (session()->has('items')) {
                for ($i = 0; $i < count(session('items')); $i++) {
                    $order = new ModelsOrder();
                    $order->user_id = auth()->user()->id;
                    $order->product_name = session('items')[$i]['name'];
                    $order->quantity = session('items')[$i]['quantity'];
                    $order->total_price = session('items')[$i]['price'];
                    $order->address = session('address');
                    $order->group_order = session('group_order');
                    $order->save();
                    event(new Order(auth()->user(), session('items')[$i]['name'], session('items')[$i]['quantity']));
                }
            } else {
                $order = new ModelsOrder();
                $order->user_id = auth()->user()->id;
                $order->product_name = session('name');
                $order->quantity = session('quantity');
                $order->total_price = session('price');
                $order->address = session('address');
                $order->group_order = session('group_order');
                $order->save();
                event(new Order(auth()->user(), session('name'), session('quantity')));
            }
        }

        CartFacade::clear();

        session()->forget(['name', 'price', 'quantity', 'group_order', 'address', 'items']);

        session()->forget('checkout_session_created');

        return redirect()->route('home')->with('msg', "Payment Successful. Your order is on its way.");
    }
    public function createCheckoutSession(StripeRequest $request)
    {
        $request->validated();

        $productName = $request->product_name;
        $totalPrice = $request->price * 100;
        $quantity = $request->quantity;
        $productImage = $request->image_url;
        $address = $request->address;


        // $stripe = new \Stripe\StripeClient(config('stripe.sk'));


        $checkout_session = $this->getStripe()->checkout->sessions->create([
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

        return redirect()->away($checkout_session->url)->with('name', $productName)->with('quantity', $quantity)->with('price', $request->price * $quantity)->with('group_order', false)->with('address', $address);
    }

    public function createCartCheckoutSession(Request $request)
    {
        $productItems = [];
        $orderItems = [];
        $address = $request->address;
        $value = CartFacade::getContent();
        foreach ($value as $item) {
            $name = $item['name'];
            $price = $item['price'] * 100;
            $quantity = $item['quantity'];

            array_push($orderItems, $item);



            // $stripe = new \Stripe\StripeClient(config('stripe.sk'));

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
            $checkout_session = $this->getStripe()->checkout->sessions->create([
                'line_items' => [$productItems],
                'mode' => 'payment',
                'customer_email' => $this->getEmail(),
                'success_url' => route('success'),
                'cancel_url' => route('cart.list'),
            ]);
        }

        return redirect()->away($checkout_session->url)->with('items', $orderItems)->with('address', $address)->with('group_order', true);;
    }
}
