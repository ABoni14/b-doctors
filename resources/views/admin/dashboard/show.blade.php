@extends('layouts.app')

@section('content')
<p>
    {{ $user->first_name }}

    @foreach ($user->specializations as $spec)
        {{ $spec->name }}
    @endforeach

    <a href="{{route("admin.dashboard.edit", Auth::user())}}" class="btn btn-primary">MODIFICA PROFILO</a>

</p>

@endsection
