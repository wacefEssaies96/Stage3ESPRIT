<?php

namespace App\Http\Controllers;

use App\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkout($operation)
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'USD',
            'description' => 'Payment From Codehunger',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        return view('checkout.credit-card', [
            'intent' => $intent,
            'operation' => $operation
        ]);
    }

    public function afterPayment(Request $request)
    {
        Paiement::create([
            'client_id' => Auth::user()->id,
            'operation' => $request->operation
        ]);

        if ($request->operation == 'depot') {
            return redirect()->route('uploadF',[Auth::user()->id]);
        }
        if ($request->operation == 'expert') {
            return redirect()->route('expertChat');
        }
        return redirect()->route('home');
    }
}
