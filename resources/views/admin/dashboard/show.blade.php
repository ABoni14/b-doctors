@extends('layouts.app')

@section('content')
{{-- <p>
    {{ $user->first_name }}

    @foreach ($user->specializations as $spec)
        {{ $spec->name }}
    @endforeach

    <a href="{{route("admin.dashboard.edit", Auth::user())}}" class="btn btn-primary">MODIFICA PROFILO</a>

</p>

<a href="{{ route('admin.index', Auth::user() ) }}" class="action">Indietro</a> --}}
<div class="container">
    <div class="profile-top mt-3 px-3 d-flex align-items-center">
        <div>
            <img src="{{ $user->photo }}" alt="not-found" width="200px">
        </div>
        <div class="ml-5">
            <h2 class="font-weight-bolder">Dr. {{ $user->first_name }} {{ $user->last_name }}</h2>
            <h5>
                @foreach ($user->specializations as $spec)
                    {{ $spec->name }}
                @endforeach
            </h5>

        </div>
    </div>

    <div class="profile-bottom mt-5 f">
        <p><strong>Indirizzo:</strong> {{ $user->address }}</p>
        <p><strong>E-Mail:</strong> {{ $user->email }}</p>
        <p><strong>Telefono:</strong> {{ $user->phone }}</p>
        <p><strong>Prestazioni:</strong>
            @foreach ($user->performances as $perf)
                {{ $perf->name }}
            @endforeach
        </p>
        <div class="mt-5">
            <p><strong>CV</strong></p>
            <p>{{ $user->cv }}</p>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div>
            <a href="{{route("admin.dashboard.edit", Auth::user())}}" class="btn btn-primary mt-4 mr-3">MODIFICA PROFILO</a>
            <a href="#" class="btn btn-danger mt-4">ELIMINA PROFILO</a>
        </div>

        <div>
            <a href="{{ route('admin.index', Auth::user() ) }}" class="btn btn-success action mt-4">Indietro</a>
        </div>
    </div>


</div>

@endsection
