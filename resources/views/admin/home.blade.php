@extends('layouts.app')

@section('content')

<section>

    {{-- <h2>Bentornato dottor </h2> --}}
    {{-- <div class="row justify-content-between">
            <div class="col-3 ab-card"><a href="{{ route('admin.dashboard.show', Auth::user() ) }}">La mia Pagina</a></div>
            <div class="col-3 ab-card"><a href="{{ route('admin.messages.index', Auth::user() )}}">Messaggi</a></div>
            <div class="col-3 ab-card"><a href="{{ route('admin.reviews.index', Auth::user() )}}">Recensioni</a></div>
            
    </div> --}}

    {{-- <div class="container-menu">
         <menu>
            <a href="{{ route('admin.dashboard.show', Auth::user() ) }}" class="action">La mia Pagina</a>
            <a href="{{ route('admin.dashboard.show', Auth::user() ) }}" class="action">La mia Pagina</a>
            <a href="{{ route('admin.reviews.index', Auth::user() )}}" class="action">Recensioni</a>

            <a href="#" class="trigger">
                <img style="    height: 200px; width: 200px; border-radius: 20px;" src="https://static.vecteezy.com/ti/vettori-gratis/p1/4234470-schermo-portatile-con-terapeuta-in-chat-consultazione-online-con-medico-chiedi-a-un-medico-online-consulenza-medica-o-servizio-di-consultazione-icona-glifo-di-telemedicina-vettoriale.jpg" alt="">
            </a>
        </menu>
    </div> --}}
    <div class="banner">
        <div class="aestroid">
            <div class="stone"></div>
            <div class="stone"></div>
            <div class="stone"></div>
            <div class="stone"></div>
            <div class="stone"></div>
            <div class="stone"></div>
            <div class="stone"></div>
        </div>
        
        <div class="banner-text">
            <h1>B-Doctor navigazione</h1>
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard.show', Auth::user() ) }}" class="action">La mia Pagina</a>
                </li>
                <li>
                    <a href="{{ route('admin.messages.index', Auth::user() )}}">Messaggi</a>
                </li>
                <li>
                    <a href="{{ route('admin.reviews.index', Auth::user() )}}" class="action">Recensioni</a>
                </li>
            </ul>
        </div>

        <div class="logo">
            <div class="image">
                <img src="{{asset('img/logo.png')}}" alt="logo">
            </div>
            <div class="circle">
                <a href="{{ route('admin.messages.index', Auth::user() )}}" class="icon">
                    <img src="{{asset('img/email.png')}}" alt="messages">
                </a>
                <a href="{{ route('admin.dashboard.show', Auth::user() ) }}" class="icon">
                    <img src="{{asset('img/home.png')}}" alt="home">
                </a>
                <a href="{{ route('admin.reviews.index', Auth::user() )}}" class="icon">
                    <img src="{{asset('img/review.png')}}" alt="review">
                </a>
                <a href="{{ route('admin.messages.index', Auth::user() )}}" class="icon">
                    <img src="{{asset('img/email.png')}}" alt="messages">
                </a>
                <a href="{{ route('admin.dashboard.show', Auth::user() ) }}" class="icon">
                    <img src="{{asset('img/home.png')}}" alt="home">
                </a>
                <a href="{{ route('admin.reviews.index', Auth::user() )}}" class="icon">
                    <img src="{{asset('img/review.png')}}" alt="review">
                </a>
                <a href="{{ route('admin.dashboard.show', Auth::user() ) }}" class="icon">
                    <img src="{{asset('img/home.png')}}" alt="home">
                </a>
                <a href="{{ route('admin.messages.index', Auth::user() )}}" class="icon">
                    <img src="{{asset('img/email.png')}}" alt="messages">
                </a>
            </div>
        </div>
    </div>

</section>
@endsection
