<div class="left-side">

    {{-- ################################################################################################ --}}
    {{-- ################################################################################################ --}}
    <div class="left-side-top">
        <div class="logo">
            <a href="{{ route('home') }}"><img id="ppp90Lg" src="{{ asset('images/logo.png') }}" alt="PPP 90"
                    srcset=""></a>
        </div>
        <div class="menuLines">
            <span id="bars" class="fa fa-bars" style="color: seashell; font-size: x-large"
                onclick="closeMenu()"></span>
            <span id="anti-bars" class="fa fa-bars" style="color:seashell; font-size: x-large; visibility: hidden"
                onclick="openMenu()"></span>
        </div>
    </div>
    {{-- ################################################################################################ --}}
    {{-- ################################################################################################ --}}
    <a class="sidebarbtn" href="{{ route('informations') }}">
        <div class="drpodown">
            <i class="fa fa-play dropbtn"></i> Information
        </div>
    </a>
    {{-- ###################### --}}
    <a class="sidebarbtn" href="{{ route('elig') }}">
        <div class="drpodown">
            <i class="fa fa-play dropbtn"></i> Éligibilité du projet
        </div>
    </a>
    {{-- ###################### --}}
    <a class="sidebarbtn" href="{{ route('uploadF') }}">
        <div class="drpodown">
            <i class="fa fa-play dropbtn"></i> Dépôt des dossiers
        </div>
    </a>
    {{-- ###################### --}}
    <a class="sidebarbtn" href="{{ route('expertChat') }}">
        <div class="drpodown">
            <i class="fa fa-play dropbtn"></i> Consultation en ligne
        </div>
    </a>
    {{-- ###################### --}}
    <a class="sidebarbtn" href="{{ route('investor') }}">
        <div class="drpodown">
            <i class="fa fa-play dropbtn"></i> Espace investisseur
        </div>
    </a>

</div>
