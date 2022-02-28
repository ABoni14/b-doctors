@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Le mie recensioni</h2>

  @foreach ($reviews as $review)
    <h2>{{ $review->user_review_name }}</h2>
    <h3>{{ $review->vote }}</h3>
    <p>{{ $review->content }}</p>

  @endforeach
</div>
@endsection