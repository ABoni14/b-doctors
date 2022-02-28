@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Bentornato dottor </h2>
    <div class="row justify-content-between">
            <div class="col-3 ab-card"><a href="{{ route('admin.dashboard.show', Auth::user() ) }}">La mia Pagina</a></div>
            <div class="col-3 ab-card">Messaggi</div>
            <div class="col-3 ab-card">Recensioni</div>
    </div>
</div>
@endsection
