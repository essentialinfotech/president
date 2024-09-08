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
            'shipping_cost' => 'required', // Validation for shipping option
        ], [
            'name.regex' => 'Please enter a valid name using letters and spaces only',
            'phone' => 'The Phone Number is Invalid!',
            'shipping_cost.required' => 'Shipping option is required.',
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

        // Determine shipping cost
        $shippingCost = $request->input('shipping_cost');

        $totalAmount = $totalPrice + $shippingCost;

        $order = new Order();
        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
            if ($request->has('address') && !empty($request->address)) {
                User::where('id', Auth::user()->id)->update(['address' => $request->address]);
            }
        } else {
            $order->user_id = null;
        }

        // Set order details
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->post_code = $request->post_code;
        $order->notes = $request->notes;
        $order->payment_method = $request->payment_method;
        $order->shipping_cost = $shippingCost; // Store shipping cost
        $order->amount = $totalAmount; // Update total amount
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
