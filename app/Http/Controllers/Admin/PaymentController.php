<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Premium_option;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function index()
    {
        $premium = Premium_option::all();

        $gateway = new Gateway([
            'environment' => config('services.braintree.enviroment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('admin.payments.payment', [
            'premium' => $premium,
            'clientToken' => $clientToken
        ]);
    }

    public function checkout(Request $request)
    {
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Luca',
                'lastName' => 'Luca',
                'email' => 'test@test.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);

            return view('admin.payments.payment')->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return view('admin.payments.payment')->withErrors('An error occurred with the message: '.$result->message);
        }
    }
}
