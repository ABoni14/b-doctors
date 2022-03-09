@extends('layouts.app')

@section('content')


<div class="container container-table">
  <a href="{{ route('admin.index', Auth::user() ) }}" class="action btn-doctors button-back mb-3">Indietro</a>

  <div class="container-messages">
    <h1 class="text-center mb-3">Messaggi</h2>
    <ul class="responsive-table">
      <li class="row table-header">
        <div class="space col-2"><i class="fas fa-user"></i> Nome utente</div>
        <div class="space col-2"><i class="fas fa-envelope"></i> Email utente</div>
        <div class="space col-5"><i class="fas fa-comment-alt"></i> Contenuto messaggio</div>
        <div class="space col-3"><i class="fas fa-exclamation"></i> Azioni</div>
      </li>

      @foreach ($messages as $message)
        <li class="row table-row">
          <div class="space col-2">{{ $message->first_name }}</div>
          <div class="space col-2">{{ $message->email }}</div>
          <div class="space col-5">{{Str::limit($message->content, 50, $end = '...')  }}</div>
          <div class="space col-3">
            <a class="btn-doctors" href="{{ route('admin.messages.show', $message) }}">Mostra</a>
            <form class="d-inline"
            onsubmit="return confirm('Eliminare messaggio di {{$message->first_name}}?')"
              action="{{route('admin.messages.destroy', $message)}}"
              method="POST"
            >
            @csrf
            @method("DELETE")
              <button type="submit" class="btn-doctors"><i class="fas fa-exclamation-triangle"></i> Elimina</button>
            </form>
          </div>
          
        </li>
      @endforeach
     
    </ul>
  </div>

</div>

@endsection
