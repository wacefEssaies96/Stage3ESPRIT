<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investisseurs</title>

    <link rel="stylesheet" href=" {{ asset('css/base.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('css/investor.css') }} ">


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
                        class="bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                    </svg>
                    <h3 id="page-title">Espace investisseurs</h3>
                </div>
                <div class="b_right-side-id"></div>
            </div>

            <div class="right-side-description">
                <h5 id="rs-des">Invesstisseurs, fonds et domaines d’activités</h5>
            </div>

            <div class="right-side-content">
                <div class="investors">
                    @foreach ($investors as $investor)
                        <div class="investor-details">
                            <div class="logo-block">
                                <div class="lg">
                                    <img src=" {{ asset('images/logo-design.png') }} " width="65px" height="65px"
                                        alt="" srcset="">
                                </div>
                                <div class="company-name">{{$investor->name}}</div>
                            </div>
                            <div class="inv-description">
                                {{$investor->description}}
                            </div>
                            <div class="amount">
                                <h3>{{$investor->fonds}} dt</h3>
                            </div>
                            <div class="inv-contact" onclick="window.location='{{ route('contact.investor', [$investor->id]) }}'">
                                <span class="fa fa-phone"></span>
                                <span class="fa fa-comments-o"></span>
                            </div>
                        </div>

                        <div class="investor-details">
                            <div class="info">INVESSTISSEURS</div>
                            <div class="info">DOMAINE D’ACTIVITÉ</div>
                            <div class="info">FONDS MOBILISÉS</div>
                            <div class="info">CONTACT</div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{-- ***************************************************************************************************************** --}}
        {{-- ***************************************************************************************************************** --}}
    </div>

    <script src=" {{ asset('js/baseLeftSide.js') }} "></script>
    <script src=" {{ asset('js/investor.js') }} "></script>
    <script src=" {{ asset('js/windowAccess.js') }} "></script>
</body>

</html>
