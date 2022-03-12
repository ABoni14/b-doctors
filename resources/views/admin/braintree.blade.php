@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <h1 class="text-center">Inserisci un metodo di Pagamento</h1>
            @if ($value)
            <h4 class="text-center my-4">Stai per acquistare il pacchetto: <strong>{{ $value }}</strong></h4>
            @endif
            <form method="post"
                id="payment-form"
                action="{{ url('/checkout') }}"
                onsubmit="return confirm('Confermi di voler effettuare il Pagamento?')"
            >
                @csrf
                <div>
                    <label for="amount">
                        <div class="input-wrapper amount-wrapper">
                            <input id="amount" name="amount" type="hidden" min="1" placeholder="Amount" value="@if ($value=='Intermediate' ) 2.99 @elseif ($value=='Advanced')5.99 @elseif($value=='Ultimate')9.99 @endif" readonly>
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </div>
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <a href="{{ route('admin.payment', Auth::user() ) }}" class="action btn-doctors button-back mb-3">Indietro</a>
                <button class="btn-doctors ml-4" type="submit"><span>Paga ora <i class="fas fa-shopping-cart"></i></span></button>
            </form>
        </div>
    </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $clientToken }}";
        braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
        paypal: {
            flow: 'vault'
        }
        }, function (createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
            if (err) {
                console.log('Request Payment Method Error', err);
                return;
            }
            // Add the nonce to the form and submit
            document.querySelector('#nonce').value = payload.nonce;
            form.submit();
            });
        });
        });
    </script>
@endsection

@section('title')
    | Metodo di pagamento
@endsection
