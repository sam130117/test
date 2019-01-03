<?php

namespace App\Http\Controllers\Web;

use App\User;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Stripe\Token;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    public function index()
    {
//        $person = new Person();
//        dd($person);
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

//class Person
//{
//    private $_name;
//    private $_age;
//
//    public function __set($property, $value)
//    {
//        $method = "set{$property}";
//        if(method_exists($this, $method)) {
//            return $this->$method($value);
//        }
//        return null;
//    }
//
//    public function setName($value)
//    {
//        $this->_name = $value;
//        if(!is_null($value)) {
//            $this->_name = $value;
//        }
//    }
//}
