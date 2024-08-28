<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // session()->forget('cart');
        $cart = session()->get('cart', []);
        return view('frontend.pages.cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {

        $product = Product::with('product_variants.variantSizes')->findOrFail($id);

        // Get the selected variant
        $selected_variant = $product->product_variants->where('id', $request->variant_id)->first();

        // Check if the selected variant exists
        if (!$selected_variant) {
            return redirect()->back()->with('error', 'Selected variant does not exist.');
        }

        // Get the selected size within the variant
        $selected_variant_size = $selected_variant->variantSizes->where('id', $request->variant_size)->first();

        // Check if the selected size exists within the variant
        if (!$selected_variant_size) {
            return redirect()->back()->with('error', 'Selected size does not exist.');
        }

        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Create a unique cart key, typically a combination of product ID and variant ID
        $cart_key = $id . '_' . $selected_variant->id . '_' . $selected_variant_size->id;

        // Add product to the cart
        $cart[$cart_key] = [
            "product_id" => $id,
            "name" => $product->product_name,
            "code" => $product->product_code,
            "variant" => [
                "id" => $selected_variant->id,
                "color" => $request->variant_color,
                "photo" => $request->variant_photo,
                "variant_size" => [
                    "id" => $selected_variant_size->id,
                    "size" => $selected_variant_size->size,
                    "qty" => $request->variant_qty ?? 1,
                    "selling_price" => $selected_variant_size->selling_price,
                    "discount_price" => $selected_variant_size->discount_price,
                ]
            ]
        ];

        // Update the cart session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }





    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }



    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            // If the cart item has a variant, update the variant quantity
            if (isset($cart[$id]['variant'])) {
                $variant_id = $cart[$id]['variant']['id'];
                $variant = ProductVariant::find($variant_id);

                if ($variant) {
                    $cart[$id]['variant']['variant_size']['qty'] = $request->quantity;
                }
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }


    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'All items have been removed from your cart.');
    }

    public function removeSelected(Request $request)
    {
        $selectedItems = json_decode($request->input('selected_items'), true);

        if (is_array($selectedItems)) {
            foreach ($selectedItems as $itemId) {
                // Remove the item from the cart
                if (session()->has("cart.$itemId")) {
                    session()->forget("cart.$itemId");
                }
            }
        }

        return redirect()->back()->with('success', 'Selected items have been removed from your cart.');
    }
}
