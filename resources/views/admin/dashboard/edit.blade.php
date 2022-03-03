@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profilo dottor</h2>

    {{-- @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif --}}


    <form action="{{route("admin.dashboard.update", Auth::user())}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <div class="form-group">
        <label for="phone">Telefono</label>
        <input type="text"
        value="{{old("phone", $user->phone)}}"
        class="form-control"
        id="phone" name="phone"
        placeholder="Inserisci numero di telefono">
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text"
        value="{{old("email", $user->email)}}"
        class="form-control"
        id="email" name="email"
        placeholder="Inserisci E-mail">
      </div>

      <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="address"
        value="{{old("address", $user->address)}}"
        class="form-control"
        id="address" name="address"
        placeholder="Inserisci indirizzo">
      </div>

      <div class="form-group">
        <label for="content">CV</label>
        <textarea
        class="form-control"
        id="cv" name="cv"
        placeholder="Inserisci il tuo cv">{{old("cv", $user->cv)}}</textarea>
      </div>

      <div class="mb-3">

          @if ($user->photo)
              <div>
                  <img width="150" src="{{ asset('storage/' . $user->photo) }}" alt="...">
              </div>
          @endif


          <label for="photo">Immagine</label>
          <input
              class="form-control"
              type="file" name="photo" id="photo">
      </div>

      <div>
        @foreach ($specializations as $item)
          <input type="checkbox" id="{{$item->id}}" name="specializations[]" value="{{$item->id}}"
          @if(!$errors->any() && $user->specializations->contains($item->id))
          checked
          @elseif ($errors->any() && in_array($item->id, old('specializations', [])))
          checked
          @endif
          >
          <label for="{{$item->id}}">{{$item->name}}</label>
        @endforeach
      </div>

      {{-- <div class="mb-3">
        <label for="category_id" class="form-label">Inserisci una categoria</label>
        <select class="form-select" name="catgory_id" id="category_id">
          @foreach ($categories as $category)
            <option @if($category->id == old("category_id", $post->category_id)) selected @endif value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div> --}}

      {{-- <div>
        <h4>Tag</h4>
        @foreach ($tags as $tag)
          <input type="checkbox" name="tags[]" id="tag{{$loop->iteration}}" value="{{$tag->id}}" @if(!$errors->any() && $post->tags->contains($tag->id)) checked @elseif($errors->any() && in_array($tag->id, old("tags", []))) checked @endif>
          <label for="tag{{$loop->iteration}}" class="mr-3">{{$tag->name}}</label>
        @endforeach
      </div> --}}

      <button type="submit" class="btn btn-primary">Change</button>
    </form>

</div>
@endsection
