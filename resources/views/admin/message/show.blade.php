@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('admin.messages.index', Auth::user() ) }}" class="action btn-doctors button-back mb-3">Indietro</a>
  <div class="container container-messages">

    <div class="">
      <h3><i class="fas fa-envelope"></i> Indirizzo Email: {{ $messages->email }}</h3>
      <h5><i class="fas fa-user "></i> Nome mittente: {{ $messages->first_name }}</h5>
    </div>

    <p class="mt-4 p-2 border">
      {{ $messages->content }}
    </p>

  </div>
</div>
@endsection