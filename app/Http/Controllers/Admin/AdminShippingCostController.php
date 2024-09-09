<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingCost;
use Illuminate\Http\Request;

class AdminShippingCostController extends Controller
{
    public function editShippingCosts()
    {
        $data['shippingCosts'] = ShippingCost::all();
        return view('backend.homepage.shipping_cost_edit', $data);
    }

    public function updateShippingCosts(Request $request)
    {
        foreach ($request->shipping_costs as $id => $cost) {
            // Validate that the cost is a positive number
            if ($cost < 0) {
                // If cost is negative, return an error notification
                $notification = array(
                    'message' => 'Shipping cost cannot be negative',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

            // If cost is valid, update the shipping cost
            $shippingCost = ShippingCost::find($id);
            $shippingCost->cost = $cost;
            $shippingCost->save();
        }

        // Success notification
        $notification = array(
            'message' => 'Shipping costs updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
