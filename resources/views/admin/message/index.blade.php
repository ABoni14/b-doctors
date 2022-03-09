@extends('layouts.app')

@section('content')
<div class="container container-table py-5 border rounded">

  {{-- <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email utente</th>
        <th scope="col">Contenuto messaggio</th>
        <th scope="col">Nome mittente</th>
        <th scope="col">Guarda</th>
        <th scope="col">Cancella</th>
        
      </tr>
    </thead>
    <tbody>
      
        @foreach ($messages as $message)
        <tr>
          <th scope="row">{{ $message->id }}</th>
          <td>{{ $message->email }}</td>
          <td>{{ $message->content }}</td>
          <td>{{ $message->first_name }}</td>
          <td><a href="{{ route('admin.messages.show', $message) }}">Mostra</a></td>
          <td><form onsubmit="return confirm('Eliminare messaggio di {{$message->first_name}}?')"
            action="{{route('admin.messages.destroy', $message)}}"
            method="POST"
            >
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger">DELETE</button>
            </form></td>
        </tr>
        @endforeach
      
    </tbody>
  </table> --}}

  <div class="container container-messages">
    <h2 class="text-center">I tuoi messaggi</h2>
    <ul class="responsive-table">
      <li class="row table-header">
        <div class="space col-2">Nome utente</div>
        <div class="space col-2">Email utente</div>
        <div class="space col-5">Contenuto messaggio</div>
        <div class="space col-3">Azioni</div>
      </li>

      @foreach ($messages as $message)
        <li class="row table-row">
          <div class="space col-2">{{ $message->first_name }}</div>
          <div class="space col-2">{{ $message->email }}</div>
          <div class="space col-5">{{Str::limit($message->content, 50, $end = '...')  }}</div>
          <div class="space col-3">
            <a class="btn btn-primary d-inline" href="{{ route('admin.messages.show', $message) }}">Mostra</a>
            <form class="d-inline"
            onsubmit="return confirm('Eliminare messaggio di {{$message->first_name}}?')"
              action="{{route('admin.messages.destroy', $message)}}"
              method="POST"
            >
            @csrf
            @method("DELETE")
              <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
          </div>
          
        </li>
      @endforeach
     
    </ul>
  </div>

  <a href="{{ route('admin.index', Auth::user() ) }}" class="action">Indietro</a>
       
</div>

@endsection
