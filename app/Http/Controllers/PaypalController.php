<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

// use to process billing agreements
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

class PaypalController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $plan_id;
    
    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
            $this->plan_id = env('PAYPAL_LIVE_PLAN_ID', '');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
            $this->plan_id = env('PAYPAL_SANDBOX_PLAN_ID', '');
        }
        
        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function paypalRedirect(){
        // Create new agreement
        $agreement = new Agreement();
        $agreement->setName('App Name Monthly Subscription Agreement')
          ->setDescription('Basic Subscription')
          ->setStartDate(\Carbon\Carbon::now()->addMinutes(5)->toIso8601String());

        // Set plan id
        $plan = new Plan();
        $plan->setId($this->plan_id);
        $agreement->setPlan($plan);

        // Add payer type
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        try {
          // Create agreement
          $agreement = $agreement->create($this->apiContext);

          // Extract approval URL to redirect user
          $approvalUrl = $agreement->getApprovalLink();

          return redirect($approvalUrl);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
        } catch (Exception $ex) {
          die($ex);
        }

    }

    public function paypalReturn(Request $request){

        $token = $request->token;
        $agreement = new \PayPal\Api\Agreement();

        try {
            // Execute agreement
            $result = $agreement->execute($token, $this->apiContext);
            $user = Auth::user();
            $user->role = 'subscriber';
            $user->paypal = 1;
            if(isset($result->id)){
                $user->paypal_agreement_id = $result->id;
            }
            $user->save();

            echo 'New Subscriber Created and Billed';

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo 'You have either cancelled the request or your session has expired';
        }
    }
}
