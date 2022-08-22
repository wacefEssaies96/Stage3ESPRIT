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
    <div class="drpodown">
        <button onclick="toggleFunction('0')" class="fa fa-play dropbtn"></button>
        <a href="#">Information</a>
        <div id="0" class="dropdown-content">
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
        </div>
    </div>
    {{-- ###################### --}}
    <div class="drpodown">
        <button onclick="toggleFunction('1')" class="fa fa-play dropbtn"></button>
        <a href="{{ route('elig') }}">Éligibilité du projet</a>
        <div id="1" class="dropdown-content">
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
        </div>
    </div>
    {{-- ###################### --}}
    <div class="drpodown">
        <button onclick="toggleFunction('2')" class="fa fa-play dropbtn"></button>
        <a href="#">Dépôt des dossiers</a>
        <div id="2" class="dropdown-content">
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
        </div>
    </div>
    {{-- ###################### --}}
    <div class="drpodown">
        <button onclick="toggleFunction('3')" class="fa fa-play dropbtn"></button>
        <a href="{{ route('expertChat') }}">Consultation en ligne</a>
        <div id="3" class="dropdown-content">
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
        </div>
    </div>
    {{-- ###################### --}}
    <div class="drpodown">
        <button onclick="toggleFunction('4')" class="fa fa-play dropbtn"></button>
        <a href="{{ route('investor') }}">Espace investisseur</a>
        <div id="4" class="dropdown-content">
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
        </div>
    </div>
</div>
