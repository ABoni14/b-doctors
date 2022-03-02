@extends('layouts.app')

@section('content')
<div class="container container-table">

  <table class="table">
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
  </table>

  <a href="{{ route('admin.index', Auth::user() ) }}" class="action">Indietro</a>
       
</div>

@endsection
