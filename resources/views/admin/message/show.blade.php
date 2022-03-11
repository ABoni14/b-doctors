@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('admin.messages.index', Auth::user() ) }}" class="action btn-doctors button-back mb-3">Indietro</a>
  <div class="container container-messages">

    <div class="">
      <h3><i class="fas fa-envelope"></i> Email utente: {{ $messages->email }}</h3>
      <h5><i class="fas fa-user mt-3"></i> Nome utente: {{ $messages->first_name }}</h5>
    </div>

    <div class="mt-4">
      <h6>Contenuto messaggio</h6>
      <p class="border p-2">
        {{ $messages->content }}
      </p>
    </div>

  </div>
</div>
@endsection

@section('title')
    | Messaggio n. {{$messages->id}}
@endsection