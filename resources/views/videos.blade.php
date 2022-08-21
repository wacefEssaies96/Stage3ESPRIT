<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulter un expert</title>

    <script src=" {{ asset('js/baseLeftSide.js') }} "></script>
    <script src=" {{ asset('js/windowAccess.js') }} "></script>

    <link rel="stylesheet" href=" {{ asset('css/base.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('css/expertConsultingRightSide.css') }} ">

    <style>
        h5 {
            text-align: center;
        }

        p {
            display: block;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 10px;
            margin-right: 10px;
            font-size: 23px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 2;
            /* text-indent: 75px; */
        }

        img {
            border-radius: 10px 100px / 120px;
        }

        body {
            background-color: white;
        }
    </style>

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
                    <a href="{{ route('home') }}"><img id="ppp90Lg" src="{{ asset('images/logo.png') }}"
                            alt="PPP 90" srcset=""></a>
                </div>
                <div class="menuLines">
                    <span id="bars" class="fa fa-bars" style="color: seashell; font-size: x-large"
                        onclick="closeMenu()"></span>
                    <span id="anti-bars" class="fa fa-bars"
                        style="color:seashell; font-size: x-large; visibility: hidden" onclick="openMenu()"></span>
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
                <div class="b_right-side-id"></div>
            </div>
            <center>
                <video width="400" style="width:80%; height:auto;" controls>
                    <source src="{{ asset('videos/borhene IGPPP.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </center>

            <center>
                <video width="400" style="width:80%; height:auto;" controls>
                    <source src="{{ asset('videos/borhene igppp2.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </center>

            <center>
                <video width="400" style="width:80%; height:auto;" controls>
                    <source src="{{ asset('videos/atef majdoub p2.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </center>

            <center>
                <video width="400" style="width:80%; height:auto;" controls>
                    <source src="{{ asset('videos/atef majdoub p3mp4.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </center>
        </div>
        {{-- ***************************************************************************************************************** --}}
        {{-- ***************************************************************************************************************** --}}
    </div>

</body>

</html>
