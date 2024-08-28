<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminOrderController extends Controller
{

    public function PendingOrder()
    {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    } // End Method 


    public function AdminOrderDetails($order_id)
    {

        $order = Order::where('id', $order_id)->first();
        if (!$order) {
            abort(404);
        }
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('backend.orders.admin_order_details', compact('order', 'orderItem'));
    } // End Method 


    public function AdminConfirmedOrder()
    {
        $orders = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    } // End Method 


    public function AdminProcessingOrder()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    } // End Method 


    public function AdminDeliveredOrder()
    {
        $orders = Order::where('status', 'deliverd')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    } // End Method 


    public function PendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'confirm']);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.confirmed.order')->with($notification);
    } // End Method 

    public function ConfirmToProcess($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.processing.order')->with($notification);
    } // End Method 


    public function ProcessToDelivered($order_id)
    {

        // $product = OrderItem::where('order_id', $order_id)->get();
        // foreach ($product as $item) {
        //     ProductVariantSize::where('product_id', $item->product_id)
        //         ->update(['quantity' => DB::raw('quantity-' . $item->qty)]);
        // }

        $productItems = OrderItem::where('order_id', $order_id)->get();

        foreach ($productItems as $item) {
            // Find the appropriate variant size based on product_id and other criteria
            $variantSize = ProductVariantSize::whereHas('productVariant', function ($query) use ($item) {
                $query->where('product_id', $item->product_id);
            })->first();

            // Update the quantity if the variant size exists
            if ($variantSize) {
                $variantSize->update(['quantity' => DB::raw('quantity - ' . $item->qty)]);
            }
        }



        Order::findOrFail($order_id)->update(['status' => 'deliverd']);

        $notification = array(
            'message' => 'Order Deliverd Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.delivered.order')->with($notification);
    } // End Method 


    public function AdminInvoiceDownload($order_id)
    {

        $order = Order::with('user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // End Method 
}
