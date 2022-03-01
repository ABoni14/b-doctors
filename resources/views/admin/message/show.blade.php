@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Mittente: {{ $messages->email }}</h3>
  <h4>Nome mittente:{{ $messages->first_name }}</h4>
  <p>{{ $messages->content }}</p>

</div>
@endsection