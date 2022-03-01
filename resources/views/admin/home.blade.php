@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Bentornato dottor </h2>
    {{-- <div class="row justify-content-between">
            <div class="col-3 ab-card"><a href="{{ route('admin.dashboard.show', Auth::user() ) }}">La mia Pagina</a></div>
            <div class="col-3 ab-card"><a href="{{ route('admin.messages.index', Auth::user() )}}">Messaggi</a></div>
            <div class="col-3 ab-card"><a href="{{ route('admin.reviews.index', Auth::user() )}}">Recensioni</a></div>
            
    </div> --}}

    <div class="container-menu">
         <menu>
            <a href="{{ route('admin.dashboard.show', Auth::user() ) }}" class="action">La mia Pagina</a></a>
            <a href="{{ route('admin.messages.index', Auth::user() )}}" class="action">Messaggi</a>
            <a href="{{ route('admin.reviews.index', Auth::user() )}}" class="action">Recensioni</a>

            <a href="#" class="trigger"><img style="height: 100px; width: 100px" src="url(https://media.discordapp.net/attachments/946052311883595776/948178075949097060/B-Doctors_1.png)" alt=""></a>
        </menu>
    </div>
   

</div>
@endsection
