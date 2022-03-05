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
        <input type="email"
        required maxlength="50"
        value="{{old("email", $user->email)}}"
        class="form-control"
        id="email" name="email"
        placeholder="Inserisci E-mail">
      </div>

      <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="address"
        minlength="5" maxlength="255" required
        value="{{old("address", $user->address)}}"
        class="form-control"
        id="address" name="address"
        placeholder="Inserisci indirizzo">
      </div>

      <div class="form-group">
        <label for="content">CV</label>
        <textarea
        minlength="5" maxlength="2000"
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

      <div>
        <select class="custom-select" multiple="multiple" name="performances[]">
            @foreach ($performances as $performance)
                <option
                    value="{{ $performance->id }}"
                    @if(!$errors->any() && $user->performances->contains($performance->id))
                    selected
                    @elseif ($errors->any() && in_array($performance->id, old('performances', [])))
                    selected
                    @endif
                >{{ $performance->name }}</option>
            @endforeach
          </select>
      </div>
      <button type="submit" class="btn btn-primary">Change</button>
    </form>

</div>
@endsection
