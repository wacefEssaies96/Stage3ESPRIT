<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulter un expert</title>

    <link rel="stylesheet" href=" {{ asset('css/base.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('css/expertConsultingRightSide.css') }} ">

</head>

<body>

    <div class="page-content">
        {{-- ***************************************************************************************************************** --}}
        {{-- ********************************************* Left Side ********************************************************* --}}
       @include('layout.sidebar')
        {{-- ################################################################################################ --}}
        {{-- ################################################################################################ --}}

        {{-- ***************************************************************************************************************** --}}
        {{-- ********************************************** Right Side ******************************************************* --}}
        <div class="right-side">
            <div class="right-side-id">
                <div class="_id">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#818282"
                        class="bi bi-headset" viewBox="0 0 16 16">
                        <path
                            d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                    </svg>
                    <h3>Consultation en ligne</h3>
                </div>
                <div class="b_right-side-id"></div>
            </div>

            <div class="right-side-description">
                <h5 id="rs-des">Appui et Accompagnement</h5>
            </div>
            <div class="right-side-content">
                @if (Auth::user()->type == 'Expert')
                    <form method="POST" action="{{ route('videocallpost') }}">
                        @csrf
                        <input hidden value="null" type="text" name="email">
                        <input id="inputRoom" type="text" name="room" placeholder="Room">
                        <button class="btnRoom" type="submit">Join</button>
                    </form>
                @else
                    @for ($i = 0; $i < count($users); $i++)
                        <div class="user fade">
                            <div class="picture">
                                <img src=" {{ asset('images/businessman.png') }} " style="width: 75px; height: 75px;"
                                    alt="User" srcset="">
                                <h4 id="name"
                                    style="color: rgb(61, 61, 61); font-size: small; font-family: sans-serif">
                                    {{ $users[$i]->name }} </h4>
                            </div>
                            <div class="text">Service</div>
                            @if ($i % 2 != 0)
                                <div class="service-description" style="background-color: #808285; color:#d8d8d8">
                                    {{ $users[$i]->service }}
                                </div>
                            @endif
                            @if ($i % 2 == 0)
                                <div class="service-description" style="background-color: #BCBEC0; color: #4e4e4e">
                                    {{ $users[$i]->service }}
                                </div>
                            @endif
                            <br>
                            <div class="contact">
                                <a href="{{ route('videocall', [$users[$i]->email, 'null']) }}"><button>Contacter
                                        !</button></a>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
            @if (Auth::user()->type != 'Expert')
                <a class="prev" onclick="plusSlides(-4)">&#10094;</a>
                <a class="next" onclick="plusSlides(4)">&#10095;</a>
            @endif
        </div>
        {{-- ***************************************************************************************************************** --}}
        {{-- ***************************************************************************************************************** --}}
    </div>
    <script src=" {{ asset('js/baseLeftSide.js') }} "></script>
    <script src=" {{ asset('js/windowAccess.js') }} "></script>
</body>

</html>
