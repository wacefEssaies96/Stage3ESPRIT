<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eligibilité du projet</title>

    <script src=" {{ asset('js/baseLeftSide.js') }} "></script>
    <script src=" {{ asset('js/websiteElig.js') }} "></script>
    <script src=" {{ asset('js/windowAccess.js') }} "></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('css/base.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('css/websiteElig.css') }} ">


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
            {{-- ###################### --}}
            <div class="right-sideP1">
                <div class="right-side-id">
                    <div class="_id">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                          </svg>
                        <h3 id="page-title">ÉLIGIBILITÉ DU PROJET</h3>
                    </div>
                    <div class="b_right-side-id"></div>
                </div>
                <div class="right-side-description">
                    <h5 id="rs-des">Suis-je éligible à l’offre spontanée PPP ?</h5>
                </div>
                <div class="right-side-content">
                    @for ($i = 1; $i <= 30; $i++)  
                        <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                            <div class="question-id">Q.{{$i}}</div>
                            <div class="question-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis porro labore commodi nesciunt asperiores consectetur ut atque ipsam ullam omnis placeat minus, dicta incidunt provident beatae debitis, corrupti quaerat unde.</div>
                            <div class="question-responses">
                                <button id="yes">Oui</button>
                                <button id="no">Non</button>
                            </div>
                        </div>
                    @endfor 
                    <div id="back-to-top">
                        <button onClick="window.scroll({ top: 0,left: 0,behavior: 'smooth' });">&#8593;</button>
                    </div>
                </div>
            </div>
            {{-- ###################### --}}
            <div class="right-sideP2">
                <img src=" https://via.placeholder.com/150/FCDE94/FFFFFF/?text=A" alt="" srcset="">
            </div>
            {{-- ###################### --}}
            <div class="right-sideNextBtn">
                <button onclick="nextQuestion()">Suivant</button>
            </div>
            {{-- ###################### --}}
        </div>
        {{-- ***************************************************************************************************************** --}}
        {{-- ***************************************************************************************************************** --}}
    </div>

    <script>
        AOS.init();
    </script>
    
</body>
</html>