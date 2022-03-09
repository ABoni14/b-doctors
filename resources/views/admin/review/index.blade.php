@extends('layouts.app')

@section('content')

<div class="container container-table">
  <a href="{{ route('admin.index', Auth::user() ) }}" class="action btn-doctors button-back mb-3">Indietro</a>

  <div class="container-messages">
    <h1 class="text-center mb-3">Recensioni</h2>
    <ul class="responsive-table">
      <li class="row table-header">
        <div class="space col-3"><i class="fas fa-user"></i> Nome utente</div>
        <div class="space col-3"><i class="fas fa-star"></i></i> Voto</div>
        <div class="space col-6"><i class="fas fa-comment-alt"></i> Contenuto recensione</div>
      </li>

      @foreach ($reviews as $review)
        <li class="row table-row">
          <div class="space col-3">{{ $review->user_review_name }}</div>
          <div class="space col-3">{{ $review->vote }}</div>
          <div class="space col-6">{{Str::limit($review->content, 50, $end = '...')  }}</div>
        </li>
      @endforeach
     
    </ul>
  </div>

</div>
@endsection