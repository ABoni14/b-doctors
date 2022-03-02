@extends('layouts.app')

@section('content')
<div class="container container-review p-3">
  <h2>Le mie recensioni</h2>

  @foreach ($reviews as $review)
    <h4>{{ $review->user_review_name }}</h4>
    <h6>{{ $review->vote }}</h6>
    <p>{{ $review->content }}</p>

  @endforeach

  <a href="{{ route('admin.index', Auth::user() ) }}" class="action">Indietro</a>
</div>
@endsection