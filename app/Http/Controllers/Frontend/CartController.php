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
        $cart = session()->get('cart', []);
        return view('frontend.pages.cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        // return $request->all();
        // Find the product with its associated multi_photos
        $product = Product::with('multi_photos')->findOrFail($id);

        // Get the variant products for the given product ID
        $variant_products = ProductVariant::where('product_id', $product->id)->get();

        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Initialize the variant information
        $selected_variant = null;

        // Check if the variant ID is provided in the request and if it exists in the product's variants
        if ($request->has('variant_id')) {
            $variant_id = $request->input('variant_id');
            $selected_variant = $variant_products->firstWhere('id', $variant_id);
        }

        // Generate a unique key for the cart item based on product ID and variant ID
        $cart_key = $id . '-' . ($selected_variant ? $selected_variant->id : 'default');

        // Check if the product-variant combination already exists in the cart
        if (isset($cart[$cart_key])) {
            // If exists, update the quantity to include the quantity of the new variant being added
            $cart[$cart_key]['variant']['quantity'] += $request->variant_qty ?? 1; // Add the quantity of the new variant
        } else {
            // Add the product-variant combination to the cart with initial quantity 1
            $cart[$cart_key] = [
                "product_id" => $id,
                "name" => $product->product_name,
                "discount_price" => $product->discount_price,
                "selling_price" => $product->selling_price,
                "variant" => $selected_variant ? [
                    "id" => $selected_variant->id,
                    "color" => $request->variant_color,
                    "quantity" => $request->variant_qty ?? 1, // Variant quantity
                    "image" => $request->variant_photo,
                ] : null
            ];
        }

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
                    $cart[$id]['variant']['quantity'] = $request->quantity;
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
