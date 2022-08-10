<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulter un expert</title>

    <script src=" {{ asset('js/baseLeftSide.js')}} "></script>
    <script src=" {{ asset('js/windowAccess.js') }} "></script>

    <link rel="stylesheet" href=" {{ asset('css/base.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('css/expertConsultingRightSide.css') }} ">

</head>
<body>

    <div class="page-content">
{{-- ***************************************************************************************************************** --}}
{{-- ********************************************* Left Side ********************************************************* --}}
        <div class="left-side">
            {{-- ################################################################################################ --}}
            {{-- ################################################################################################ --}}
            <div class="left-side-top">
                <div class="logo">
                    <a href="{{ route('home') }}"><img id="ppp90Lg" src="{{ asset('images/logo.png') }}" alt="PPP 90" srcset=""></a>
                </div>
                <div class="menuLines">
                    <span id="bars" class="fa fa-bars" style="color: seashell; font-size: x-large" onclick="closeMenu()"></span>
                    <span id="anti-bars" class="fa fa-bars" style="color:seashell; font-size: x-large; visibility: hidden" onclick="openMenu()"></span>
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
        {{-- ################################################################################################ --}}
        {{-- ################################################################################################ --}}

{{-- ***************************************************************************************************************** --}}
{{-- ********************************************** Right Side ******************************************************* --}}
        <div class="right-side">
            <div class="right-side-id">
                <div class="_id">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#818282" class="bi bi-headset" viewBox="0 0 16 16">
                        <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z"/>
                    </svg>
                    <h3>Consultation en ligne</h3>
                </div>
                <div class="b_right-side-id"></div>
            </div>

            <div class="right-side-description">
                <h5 id="rs-des">Appui et Accompagnement</h5>
                <form method="POST" action="{{route('videocallpost')}}">
                    @csrf
                    <input hidden value="null" type="text" name="email">
                    <input type="text" name="room" placeholder="Room">
                    <button type="submit">Join</button>
                </form>

            </div>
            <div class="right-side-content">
                @for ($i = 0; $i < count($users); $i++)
                    <div class="user fade">
                        <div class="picture">
                            <img src=" {{ asset('images/businessman.png') }} " style="width: 75px; height: 75px;" alt="User" srcset="">
                            <h4 id="name" style="color: rgb(61, 61, 61); font-size: small; font-family: sans-serif"> {{ $users[$i]->name }} </h4>
                        </div>
                        <div class="text">Service</div>
                            @if ( $i % 2 != 0)
                                <div class="service-description" style="background-color: #808285; color:#d8d8d8">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id similique, architecto aut autem esse temporibus, libero mollitia vitae eos nisi veniam qui vero eaque molestiae voluptatum eius dicta nobis. Reiciendis.
                                </div>
                            @endif
                            @if ( $i % 2 == 0)
                                <div class="service-description" style="background-color: #BCBEC0; color: #4e4e4e">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id similique, architecto aut autem esse temporibus, libero mollitia vitae eos nisi veniam qui vero eaque molestiae voluptatum eius dicta nobis. Reiciendis.
                                </div>
                            @endif
                        <br>    
                        <div class="contact">
                            <a href="{{route('videocall', [$users[$i]->email,'null'])}}"><button>Contacter !</button></a>
                        </div>
                    </div>
                @endfor
            </div>

            <a class="prev" onclick="plusSlides(-4)">&#10094;</a>
            <a class="next" onclick="plusSlides(4)">&#10095;</a>

        </div>
{{-- ***************************************************************************************************************** --}}
{{-- ***************************************************************************************************************** --}}
    </div>

</body>
</html>