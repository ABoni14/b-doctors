@extends('layouts.app')

@section('content')

<section>
    <div class="area" >
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        

    </div>


        <div class="div-menu">
            <h1 class="title-menu">BDoctors</h1>
            <span class="subtitle-menu">Menù di navigazione</span>
            <nav class="dashboard-nav-menu container">
                <div class="menuItems row justify-content-between">
                    <a class="btn-doctors col-lg-5" href="{{ route('admin.dashboard.show', Auth::user() ) }}">La mia Pagina</a>
                    <a class="btn-doctors col-lg-5" href="{{ route('admin.messages.index', Auth::user() )}}">Messaggi</a>
                    <a class="btn-doctors col-lg-5" href="{{ route('admin.reviews.index', Auth::user() )}}">Recensioni</a>
                    <a class="btn-doctors col-lg-5" href="{{ route('admin.payment', Auth::user() )}}">Premium</a>
                </div>
            </nav>
        </div>
       


   


</section>
@endsection

@section('title')
    | Dashboard 
@endsection
