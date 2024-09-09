<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cancelOrder(Request $request)
    {
        $order = Order::where('invoice_no', $request->invoice_no)->first();

        if ($order && $order->status != 'cancel') {
            // Update order status and cancel date
            $order->status = 'cancel';
            $order->cancel_date = Carbon::now()->format('d F Y');
            $order->save();

            return response()->json(['code' => 1, 'success_message' => 'Order has been cancelled successfully']);
        } else {
            return response()->json(['code' => 0, 'error_message' => 'Order not found or already cancelled']);
        }
    }
}
