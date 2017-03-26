<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use App\Order;
use Auth;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);
    	$request->session()->put('cart', $cart);
    	return redirect()->route('product.index');
    }

    public function getCart()
    {
    	if(!Session::has('cart')) {
    		return view('shop.shopping-cart', ['products' => null]);
    	} else {
    		$oldCart = Session::get('cart');
    		$cart = new Cart($oldCart);
    		return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    	}
    }

    public function getStripe()
    {
    	if(!Session::has('cart')) {
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('shop.checkout-stripe', ['total' => $total]);
    }

    public function postStripe(Request $request)
    {
    	if(!Session::has('cart')) {
    		return redirect()->route('product.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);

    	Stripe::setApiKey('sk_test_YYgdEvsN9PUA3SGUbZTQTOYg');
    	try {
    		$charge = Charge::create(array(
               "amount" => $cart->totalPrice * 100,
               "currency" => "usd",
               "source" => $request->input('stripeToken'),
               'description'=> "Test Charge"
    		));
    		//dd($charge);
    		$order = new Order();
    		$order->cart = serialize($cart);
    		$order->address = $request->input('address');
    		$order->name = $request->input('name');
    		$order->payment_id = $charge->id;
    		$order->user_id = Auth::user()->id;

    		$order->save();

    	} catch (\Exception $e) {
    		return redirect()->route('getStripe')->with('error', $e->getMessage());
    	}

    	Session::forget('cart');
    	return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }
}
