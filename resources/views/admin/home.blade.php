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
<<<<<<< HEAD
    
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
        
=======
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
                <li>
                    <a href="{{ route('admin.payment', Auth::user() )}}" class="action">Sponsorizzazione</a>
                </li>
            </ul>
        </div>
>>>>>>> 18a38b91d4e51782a4be16a97fc680941b1d89cd

    </div>


        <div class="div-menu">
            <h1 class="title-menu">BDoctors</h1>
            <span class="subtitle-menu">Menù di navigazione</span>
            <nav class="dashboard-nav-menu">
            <div class="menuItems">
                <a class="btn-doctors" href="{{ route('admin.dashboard.show', Auth::user() ) }}">La mia Pagina</a>
                <a class="btn-doctors" href="{{ route('admin.messages.index', Auth::user() )}}">Messaggi</a>
                <a class="btn-doctors" href="{{ route('admin.reviews.index', Auth::user() )}}">Recensioni</a>
            </div>
            </nav>
        </div>
       


   


</section>
@endsection
