@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="{{ route('braintree', ['value' => $premium[1]->name ])}}" class="data-card">
                    <h4>{{ $premium[1]->name }}</h4>
                    <h5>Dettaglio Offerta</h5>
                    <p>Sponsorizza il tuo profilo per {{ $premium[1]->duration}} ore! </p>
                    <span class="link-text">
                        A soli: € {{ $premium[1]->price }}
                        <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                                fill="#753BBD" />
                        </svg>
                    </span>
                </a>
            </div>
            <div class="col-4">
                <a href="{{ route('braintree', ['value' => $premium[2]->name ])}}" class="data-card">
                    <h4>{{ $premium[2]->name }}</h4>
                    <h5>Dettaglio Offerta</h5>
                    <p>Sponsorizza il tuo profilo per {{ $premium[2]->duration}} ore! </p>
                    <span class="link-text">
                        A soli: € {{ $premium[2]->price }}
                        <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                                fill="#753BBD" />
                        </svg>
                    </span>
                </a>
            </div>
            <div class="col-4">
                <a href="{{ route('braintree', ['value' => $premium[3]->name ])}}" class="data-card">
                    <h4>{{ $premium[3]->name }}</h4>
                    <h5>Dettaglio Offerta</h5>
                    <p>Sponsorizza il tuo profilo per {{ $premium[3]->duration}} ore! </p>
                    <span class="link-text">
                        A soli: € {{ $premium[3]->price }}
                        <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                                fill="#753BBD" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    | Sponsorizzazione
@endsection
