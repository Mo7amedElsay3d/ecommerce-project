<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{









    public function show($id)
    {

        $product = Product::findOrFail($id);

        // المنتجات المرتبطة (نفس الكاتيجوري)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->get();
        return view('products.singleProduct', compact('product', 'relatedProducts'));
    }



    public function add($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $userId = Auth::id();
        $quantity = $request->quantity ?? 1;

        $cartItem = CartItem::where('user_id', $userId)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => $quantity,
            ]);
        }
        return redirect()->back()->with('success', 'Added to cart ✅');
    }


    public function cart()
    {

        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('products.cart', compact('cartItems'));
    }
    public function increase($id)
    {
        $item = CartItem::findOrFail($id);

        $item->quantity += 1;
        $item->save();

        return back();
    }
    public function decrease($id)
    {
        $item = CartItem::findOrFail($id);

        if ($item->quantity > 1) {
            $item->quantity -= 1;
            $item->save();
        } else {
            $item->delete();
        }

        return back();
    }

    public function remove($id)
    {
        $cartItem = CartItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cartItem->delete();

        return back()->with('success', 'Product removed from cart');
    }
    public function placeOrder(Request $request)
    {

        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'cart is empty');
        }
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        $order =  Order::create([

            'user_id' => Auth::id(),

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'address' => $request->address,

            'total' => $total,

            'payment_method' => $request->payment_method,

            'payment_status' => 'pending',


            'status' => 'pending',

        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        CartItem::where('user_id', Auth::id())->delete();

        return redirect('/checkout')->with('success', 'Order placed successfully');
    }


    public function checkout()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('products.checkOut', compact('cartItems'));
    }




    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('MyOrder')
            ->with('success', 'Order placed successfully');
    }
    public function order()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('products.Orders', compact('orders'));
    }
}
