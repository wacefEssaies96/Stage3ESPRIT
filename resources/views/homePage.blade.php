<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PPP 90</title>
    <script src=" {{ asset('js/windowAccess.js') }} "></script>

    <link rel="stylesheet" href=" {{ asset('css/home.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="page-content">

        <nav>
            <div class="leftSide">
                <a href=" {{ route('home') }} " class="menu-item"><img id="ppp90Lg"
                        src="{{ asset('images/logo.png') }}" alt="PPP 90" srcset=""></a>
                <a href=" {{ route('about-us') }} " class="menu-item bgeff">Qui sommes nous ?</a>
                <a href=" {{ route('services') }} " class="menu-item bgeff">Nos services</a>
                <a href=" {{ route('contact.create') }} " class="menu-item bgeff">Contacter nous</a>
                <a href=" {{ route('projects') }} " class="menu-item bgeff">Exemple de ppp realisés</a>
            </div>
            <div class="rightSide">
                <a href="" class="menu-item bgeff" style="border-right: white 1px solid"><span
                        class="fa">&#xf002;</span></a>
                @guest
                    <a href="{{ route('login') }}" class="menu-item bgeff" style="border-right: white 1px solid"><span
                            class="fa">&#xf2c0;</span></a>
                    <a href="" class="menu-item"><span class="fa">&#xf29c;</span></a>
                    <button><a href="{{ route('login') }}" class="menu-item">se connecter</a></button>
                @else
                    <a href="{{ route('user.show', Auth::user()->id) }}" class="menu-item bgeff"
                        style="border-right: white 1px solid"><span class="fa">&#xf2c0;</span></a>
                    <a href="" class="menu-item"><span class="fa">&#xf29c;</span></a>
                    <button><a href="{{ route('logout') }}" class="menu-item">Déconnexion</a></button>
                @endguest
            </div>
        </nav>

        <section>
            <h1>BIENVENUE</h1>
            <h2>SUR LA 1ère PLATEFORME</h2>
            <p>DE GESTION DES PROJETS</p>
            <p>EN OFFRE SPONTANÉE PPP</p>
        </section>

        <footer>
            <div class="info">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white"
                    class="bi bi-lightbulb" viewBox="0 0 16 16">
                    <path
                        d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z" />
                </svg>
                <div>
                    <p id="infoContent">Vous êtes celui qui détient les clés de votre destin. Il vous suffit de vous
                        lancer !</p>
                </div>
            </div>
            <div class="bottom-menu">
                <div class="flex-container">
                    <div class="row">
                        <div><span class="fa">&#xf05a;</span></div>
                        <div>PAGE D'INFORMATIONS</div>
                    </div>
                </div>
                <div class="flex-container" onclick="window.location='{{ route('elig') }}'">
                    <div class="row">
                        <div><span class="fa">&#xf046;</span></div>
                        <div>ÉLIGIBILITÉ DU PROJET</div>
                    </div>
                </div>
                @guest
                    <div class="flex-container" onclick="window.location='{{ route('login') }}'">
                        <div class="row">
                            <div><span class="fa">&#xf115;</span></div>
                            <div>DÉPÔT DES DOSSIERS</div>
                        </div>
                    </div>
                @else
                    @if (Auth::user()->type == 'Client')
                        <div class="flex-container" onclick="window.location='{{ route('uploadF', Auth::user()->id) }}'">
                            <div class="row">
                                <div><span class="fa">&#xf115;</span></div>
                                <div>DÉPÔT DES DOSSIERS</div>
                            </div>
                        </div>
                    @else
                        <div class="flex-container" onclick="alt('{{ Auth::user()->id }}')">
                            <div class="row">
                                <div><span class="fa">&#xf115;</span></div>
                                <div>DÉPÔT DES DOSSIERS</div>
                            </div>
                        </div>
                        <script>
                            function alt(x) {
                                alert("Vous n'avez pas le droit d'accéder à cette page! Créer un compte client puis réssayer.\n" + x);
                            }
                        </script>
                    @endif
                @endguest
                <div class="flex-container" onclick="window.location='{{ route('expertChat') }}'">
                    <div class="row">
                        <div><span class="fa">&#xf025;</span></div>
                        <div>CONSULTATION EN LIGNE</div>
                    </div>
                </div>
                <div class="flex-container" onclick="window.location='{{ route('investor') }}'">
                    <div class="row">
                        <div><span class="fa">&#xf0c0;</span></div>
                        <div>ESPACE INVESSTISSEURS</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
