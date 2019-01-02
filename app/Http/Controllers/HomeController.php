<?php

namespace App\Http\Controllers;

use App\User;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Stripe\Token;

class HomeController extends Controller
{

    public function index()
    {
//        return $this->stripeExample();
        return view('index');
    }

    private function stripeExample()
    {
        try {
            Cashier::useCurrency('eur', '€');
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripeToken = Token::create([
                "card" => [
                    "number"    => '4242424242424242',
                    "exp_month" => '03',
                    "exp_year"  => '20',
                    "cvc"       => '123',
                    "name"      => 'Visa',
                ],
            ]);
            $stripeTokenId = $stripeToken->id;
            $user = User::where('id', 3)->first();
            return $user->downloadInvoice('in_1Do72cKF2xQvm0Z7Y9ASuxe5', [
                'vendor'  => 'Your Company',
                'product' => 'Your Product',
            ]);
            dd($user->invoices());
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
