<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Contracts\Service\Attribute\Required;
use Omnipay\Omnipay;

class ApiController extends Controller
{
    //
    protected $gateway;
    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);

    }

    public function index(){

        return view('api.systemAPI');
    }

    public function pagamento(Request $request){

        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->total,
                'curency' => env('PAYPAL_CORRENCY'),
                'returnUrl' => url('sucess'),
                'cancelUrl' => url('error'),
            ))->send();

            if($response->isRedirect()){
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();

        }

    }



}
