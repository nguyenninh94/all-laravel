<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\OrderShipped;

class SendMailController extends Controller
{
    public function sendMail()
    {
    	$content = [
            'title'=> 'Itsolutionstuff.com mail', 
    		'body'=> 'The body of your message.',
    		'button' => 'Click Here'
    	];

    	$receiver = 'nguyenninhdt94@gmail.com';
    	Mail::to($receiver)->send(new OrderShipped($content));
        return redirect('/')->with('success', 'Send mail success');
    }
}
