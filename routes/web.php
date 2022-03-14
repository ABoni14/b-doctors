<?php

use App\User;
use Carbon\Carbon;
use App\Premium_option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware("auth")
    ->namespace("Admin")
    ->name("admin.")
    ->prefix("admin")
    ->group(function(){
        Route::get("/", "HomeController@index")->name("index");
        Route::resource("dashboard", 'UserController');
        Route::resource("messages", "MessageController");
        Route::resource("reviews", "ReviewController");

        //dashboard sponsor payments links
        Route::get("/payments", function(){

            $premium = Premium_option::all();
            return view("admin.payments.payment", compact("premium"));
        })->name("payment");
    });

// Braintree payment form and route
Route::get("/payments/braintree", function(Request $request){

    $value = $request->value;

    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey'),
    ]);

    $clientToken = $gateway->clientToken()->generate();

    return view("admin.braintree", [
        'clientToken' => $clientToken,
        'value' => $value
    ]);

})->name("braintree");

//braintree payment form process and table update
Route::post('/checkout', function (Request $request) {

    $gateway = new Braintree\Gateway([
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
            'firstName' => Auth::user()->first_name,
            'lastName' => Auth::user()->last_name,
            'email' => Auth::user()->email,
        ],
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
        $transaction = $result->transaction;

        if($transaction->amount == '2.99'){
            $user = User::find(Auth::user()->id);

            $user->premium_options()->attach([2=>[
                'start_date' => Carbon::now()->toDateTimeString(),
                'end_date'=> Carbon::now()->addHours(24)
            ]]);
        }

        if($transaction->amount == '5.99'){
            $user = User::find(Auth::user()->id);

            $user->premium_options()->attach([3=>[
                'start_date' => Carbon::now()->toDateTimeString(),
                'end_date'=> Carbon::now()->addHours(72)
            ]]);
        }

        if($transaction->amount == '9.99'){
            $user = User::find(Auth::user()->id);

            $user->premium_options()->attach([4=>[
                'start_date' => Carbon::now()->toDateTimeString(),
                'end_date'=> Carbon::now()->addHours(144)
            ]]);
        }

        return redirect('/admin/payments')->with('success_message', 'Transazione eseguita con successo! Il tuo codice transazione: '. $transaction->id);

    } else {
        $errorString = "";

        foreach ($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        // $_SESSION["errors"] = $errorString;
        // header("Location: index.php");
        return back()->withErrors('An error occurred with the message: '.$result->message);
    }
});




// catch all front end and unknonwn back end routs
Route::get("{any?}", function(){
    return view("guest.home");
})->where("any", ".*")->name("home");

