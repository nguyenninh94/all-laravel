<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Session;
use App\Cart;
use Auth;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;

class PaypalController extends Controller
{

    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
               config('paypal.client_id'),
               config('paypal.secret')
            )
        );
        $this->apiContext->setConfig([config('paypal.settings')]);
    }
 
    public function index()
    {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout-paypal', ['total' => $total]);
    }

    
    public function create(Request $request)
    {
        $paymentId = Session::get('paymentId');
        Session::forget('paymentId');
        /*if(empty(Request::get('PayerID')) || empty(Request::get('token'))) {
            Session::put('error', 'Payment failed');
        }*/

         
        $execution = new PaymentExecution();
        $execution->setPayerId($request::input('PayerID'));

        $payment = Payment::get($paymentId, $this->apiContext);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            if($result->getState() == 'approved')
            {
                Session::put('success', 'Payment Successfully');
                return redirect()->route('product.index');
            }
            
        } catch(Exception $e) {
            Session::put('error', 'Payment failed');
            return redirect()->route('checkoutpaypal.index');
        }
    }

    
    public function store(Request $request)
    {
        //dd($this->apiContext);
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);
        $total = $cart->totalPrice;
        //dd($total);
        $product = $cart->items;
        $shipping = 1.2;
        $tax = 1.3;
        $totalPrice = $total + $shipping + $tax;

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item_list = [];
        foreach($product as $p) {
            $item = new Item();
            $item->setName($p['item']['title'])
                 ->setCurrency('USD')
                 ->setQuantity($p['item']['qty'])
                 ->setSku($p['item']['id'])
                 ->setPrice($p['item']['price']);    

            $item_list[] = $item;     
        } 
        //dd($item_list);


        $itemList = new ItemList();
        $itemList->setItems(array($item_list));
        //dd($itemList);

        $details = new Details();
        $details->setShipping($shipping)
          ->setTax($tax)
          ->setSubtotal($total);
        //dd($totalPrice);

        $amount = new Amount();
        $amount->setCurrency("USD")
          ->setTotal($totalPrice)
          ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
          ->setItemList($itemList)
          ->setDescription("Payment description")
          ->setInvoiceNumber(uniqid());

        //$baseUrl = getBaseUrl();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('checkoutpaypal.create'))
           ->setCancelUrl(route('checkoutpaypal.create'));

        $payment = new Payment();
        $payment->setIntent("sale")
          ->setPayer($payer)
          ->setRedirectUrls($redirectUrls)
          ->setTransactions(array($transaction));
        //dd($payment);
        //$request = clone $payment;

        try {
           $payment->create($this->apiContext);
           $order = new Order();
            $order->cart = serialize($cart);
            $order->name = $request->input('name');
            $order->address = $request->input('address');
            $order->payment_id = $payment->id;
            $order->user_id = Auth::user()->id;
            $order->save();

        } catch (\PayPal\Exception\PPConnectionException $ex) {
    
           Session::put('error', 'Connection timeout');
           return redirect()->route('checkoutpaypal.index');
        }
        Session::forget('cart');

        $approvalUrl = $payment->getApprovalLink();

        Session::put('paymentId', $payment->id);
        return redirect()->to($approvalUrl);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
