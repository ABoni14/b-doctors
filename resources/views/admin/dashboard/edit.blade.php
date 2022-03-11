@extends('layouts.app')

@section('content')
<div class="container profile">
    <h2>Profilo dottor {{ $user->first_name }} {{ $user->last_name }}</h2>


    <form action="{{route("admin.dashboard.update", Auth::user())}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <div class="mb-3">

          @if ($user->photo)
              <div>
                  <img width="150" src="{{ asset('storage/' . $user->photo) }}" alt="...">
              </div>
          @endif

          <label for="photo">Cambia la tua foto</label>
          <input
          style="height: 45px"
              class="form-control"
              type="file" name="photo" id="photo">
      </div>

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



      {{-- <div>
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
      </div> --}}



      <div class="container">
        <ul class="ks-cboxtags">
          @foreach ($specializations as $item)
            <li>
              <input type="checkbox" id="{{$item->id}}" name="specializations[]" value="{{$item->id}}"
              @if(!$errors->any() && $user->specializations->contains($item->id))
              checked
              @elseif ($errors->any() && in_array($item->id, old('specializations', [])))
              checked
              @endif
              >
              <label for="{{$item->id}}">{{$item->name}}</label>
            </li>
          @endforeach

        </ul>

      </div>
        <div>
          <select name="performances[]" multiple="multiple" id="sources" class="custom-select sources" placeholder="Source Type">

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
      <div>
{{--
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
          </select> --}}
      </div>
      <button type="submit" class="btn-doctors mt-3">Modifica</button>
      <a href="{{ route('admin.dashboard.show', Auth::user() ) }}" class="btn-doctors button-back mt-2">Indietro</a>
    </form>

</div>
@endsection

@section('title')
    | Modifica profilo
@endsection
