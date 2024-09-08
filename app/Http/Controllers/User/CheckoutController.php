<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }


        return view('frontend.pages.checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        // Validation
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z][a-zA-Z0-9 ]*$/',
            ],
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'address' => 'required',
            'payment_method' => 'required',
        ], [
            'name.regex' => 'Please enter a valid name using letters and spaces only',
            'phone' => 'The Phone Number is Invalid!',
        ]);


        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }



        $totalPrice = array_sum(array_map(function ($item) {
            $quantity = $item['variant']['variant_size']['qty']; // Ensure 'qty' is the correct key

            if ($item['variant']['variant_size']['discount_price']) {
                return $item['variant']['variant_size']['discount_price'] * $quantity;
            } else {
                return $item['variant']['variant_size']['selling_price'] * $quantity;
            }
        }, $cart));

        $order = new Order();
        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
            if ($request->has('address') && !empty($request->address)) {
                User::where('id', Auth::user()->id)->update(['address' => $request->address]);
            }
        } else {
            $order->user_id = null;
        }

        // $order->user_id = null;

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->adress = $request->address;
        $order->post_code = $request->post_code;
        $order->notes = $request->notes;

        $order->payment_method = $request->payment_method;

        if ($request->payment_method == "bKash" || $request->payment_method == "Rocket" || $request->payment_method == "Nagad") {
            // Validation
            $request->validate([
                'transaction_id' => 'required',
                'sender_phone_number' => 'required|digits:11',
            ], [
                'sender_phone_number' => 'The Phone Number is Invalid!',
                'sender_phone_number.required' => 'Phone Field is Required',
            ]);
            $order->transaction_id = $request->transaction_id;
            $order->sender_phone_number = $request->sender_phone_number;
        }

        $order->amount = $totalPrice;
        $order->order_number = uniqid();

        $order->invoice_no = 'CUST' . mt_rand(10000000, 99999999);
        $order->order_date = Carbon::now()->format('d F Y');
        $order->order_month = Carbon::now()->format('F');
        $order->order_year = Carbon::now()->format('Y');
        $order->status = 'pending';
        if ($order->save()) {
            foreach (session('cart', []) as $details) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $details['product_id'];
                $orderItem->color = $details['variant']['color'];
                $orderItem->size = $details['variant']['variant_size']['size'];
                $orderItem->image = $details['variant']['photo'];
                $orderItem->qty = $details['variant']['variant_size']['qty'];
                if ($details['variant']['variant_size']['discount_price']) {
                    $orderItem->price = $details['variant']['variant_size']['discount_price'];
                } else {
                    $orderItem->price = $details['variant']['variant_size']['selling_price'];
                }
                $orderItem->save();
            } // End Foreach
        }

        // Clear the cart after successful order
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Your order has been placed successfully!');
    }
}
