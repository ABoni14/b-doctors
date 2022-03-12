@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.index', Auth::user() ) }}" class="action btn-doctors button-back mb-3">Indietro</a>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-5 col-lg-4">
                <a href="{{ route('braintree', ['value' => $premium[1]->name ])}}" class="data-card">
                    <h4>{{ $premium[1]->name }}</h4>
                    <h5>Dettaglio Offerta</h5>
                    <p>Sponsorizza il tuo profilo per {{ $premium[1]->duration}} ore! </p>
                    <span class="link-text">
                        A soli: € {{ $premium[1]->price }}
                        <i class="fas fa-arrow-right pl-3"></i>
                    </span>
                </a>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-4">
                <a href="{{ route('braintree', ['value' => $premium[2]->name ])}}" class="data-card">
                    <h4>{{ $premium[2]->name }}</h4>
                    <h5>Dettaglio Offerta</h5>
                    <p>Sponsorizza il tuo profilo per {{ $premium[2]->duration}} ore! </p>
                    <span class="link-text">
                        A soli: € {{ $premium[2]->price }}
                        <i class="fas fa-arrow-right pl-3"></i>
                    </span>
                </a>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-4">
                <a href="{{ route('braintree', ['value' => $premium[3]->name ])}}" class="data-card">
                    <h4>{{ $premium[3]->name }}</h4>
                    <h5>Dettaglio Offerta</h5>
                    <p>Sponsorizza il tuo profilo per {{ $premium[3]->duration}} ore! </p>
                    <span class="link-text">
                        A soli: € {{ $premium[3]->price }}
                        <i class="fas fa-arrow-right pl-3"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    | Sponsorizzazione
@endsection
