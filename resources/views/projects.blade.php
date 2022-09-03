<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects</title>

    <link rel="icon" href="{{ asset('images/logoapp.png') }}" type="image/png">
    <link rel="stylesheet" href=" {{ asset('css/base.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('css/expertConsultingRightSide.css') }} ">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    <style>

    </style>

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
            </div>
            <div class="container-fluid px-0">
                <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                    <div class="carousel-inner bg-dark" role="listbox">
                        <div class="carousel-item active">
                            <center>
                                <video controls style="width:70%;">
                                    <source src="{{ asset('videos/borhene IGPPP.mp4') }}" type="video/mp4">
                                </video>
                            </center>
                        </div>
                        <div class="carousel-item">
                            <center>
                                <video controls style="width:70%;">
                                    <source src="{{ asset('videos/borhene igppp2.mp4') }}" type="video/mp4">
                                </video>
                            </center>
                        </div>
                        <div class="carousel-item">
                            <center>
                                <video controls style="width:70%;">
                                    <source src="{{ asset('videos/atef majdoub p2.mp4') }}" type="video/mp4">
                                </video>
                            </center>
                        </div>
                        <div class="carousel-item">
                            <center>
                                <video controls style="width:70%;">
                                    <source src="{{ asset('videos/atef majdoub p3mp4.mp4') }}" type="video/mp4">
                                </video>
                            </center>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2 shadow d-block"
                            aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-2 shadow d-block"
                            aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <br>
            <br>
            <div class="right-side-description">
                <h5 id="rs-des">Introduction</h5>
            </div>
            <div>

                <img style="margin-right: 20px; width: 45vh; float: left;" src="{{ asset('images/projects/1.png') }}">

                <p>Le partenariat entre le secteur public et le secteur privé (PPP), un troisième titre pour le
                    financement de grands projets d'infrastructures et de services, sans aucune charge supplémentaire
                    sur les ressources de l'État... à condition que les conditions appropriées soient réunies pour des
                    investissements internes et externes et un développement global stratégie
                </p>

                <p>
                    La plupart des grands projets dans le monde sont mis en œuvre aujourd'hui selon cette formule qui
                    surmonte le problème du financement et de la rareté des ressources
                    finances des pays. Tel que BRT DAKAR , TER DAKAR , SPORTS HUB SINGAPOR - DAKOTA , LA SEINE MUSICAL
                    France , HÔPITAL MUNICIPAL DE ÇAM VA SAKURA-ISTANBUL TURQUIE ....
                </p>
                <p>Nous avons besoin de grandes infrastructures et de projets de base pour changer la face de la vie en
                    Tunisie.
                    Nous découvrirons ensemble des projets réussis, en détail, dans les prochains articles
                </p>
                <br>
                <br>

                <div class="right-side-description">
                    <h5 id="rs-des">La Seine musicale</h5>
                </div>
                <img style="margin-left: 20px; border-radius:10px; width: 45vh; float: right;"
                    src="{{ asset('images/projects/music.jpg') }}">
                <p>
                    C'est un ensemble de bâtiments en forme de navire, dédié à la musique, ouvert à tous les publics et
                    pouvant accueillir
                    Manifestations diverses (artistiques, politiques, festives, commerciales, etc.). Il est situé sur le
                    lit de la rivière d'une île
                    Séguin en France
                    Le tout a été mis en œuvre dans le cadre d'un contrat de partenariat public-privé portant sur la
                    conception et la construction de bâtiments
                    Il est financé, exploité et entretenu et stipule que l'opérateur doit développer des revenus
                    d'exploitation grâce au développement de logiciels
                    Lequel reste sous sa responsabilité et ses risques, en plus de la programmation du Conseil général.
                    En contrepartie, l'opérateur rembourse
                    Un montant garanti qui réduit le coût pour la société, avec un minimum de 150,8 millions d'euros sur
                    vingt-sept ans.
                </p>
                <br>
                <br>
                <br>
                <br>

                <div class="right-side-description">
                    <h5 id="rs-des">Bus Rapid Transit (BRT)</h5>
                </div>
                <img style="margin-right: 20px; width: 45vh; float: left; border-radius: 5% / 70%;"
                    src="{{ asset('images/projects/BRT.jpg') }}">
                <p>
                    Un projet qui s'inscrit dans le cadre du partenariat entre les secteurs public et privé et vise à
                    faciliter les transports entre mes villes
                    "Dakar" et "Gigway"
                    Il peut transporter 300 000 passagers par jour.
                    Le coût total du projet de bus de transport en commun rapide a atteint 300 milliards de francs CFA,
                    et il aura
                    Une flotte de 144 bus, qui transportera 300 000 passagers en 45 minutes entre la banlieue et le
                    centre de Dakar.
                </p>
                <p>Quesque Bus Rapid Transit BRT ?</p>
                <p>C'est un type de bus haute fréquence ou de bus express
                    transit) (ou BRT en abrégé) est un système de transport public flexible et intégré
                    Il offre un service rapide et sûr, car il s'appuie sur des bus de grande capacité qui circulent sur
                    des voies désignées dans des voies spéciales.
                    Il offre un haut niveau de services, car il fonctionne à des fréquences allant jusqu'à quelques
                    minutes.
                </p>
                <br>
                <br>
                <div class="right-side-description">
                    <h5 id="rs-des">Stade 974 au Qatar</h5>
                </div>
                <img style="margin-left: 20px; border-radius:10px; width: 45vh; float: right;"
                    src="{{ asset('images/projects/stage.jpg') }}">
                <br>
                <br>
                <p>
                    Ou comme on l'appelait auparavant, le stade Ras Abu Aboud est un stade de football, d'une capacité
                    de
                    40 000 spectateurs. Construit à partir de conteneurs
                    Le transport maritime et les unités de construction démontables font partie des projets de
                    partenariat public-privé au Qatar.
                </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="right-side-description">
                    <h5 id="rs-des">
                        Hôpital Başakşehir à Istanbul</h5>
                </div>
                <img style="margin-right: 20px; width: 45vh; float: left; border-radius: 10px;"
                    src="{{ asset('images/projects/turkia.jpg') }}">
                <p dir="rtl">
                    C'est une ville médicale et c'est le plus grand complexe médical d'Europe
                    Voici l'hôpital de la ville de Başakşehir qui a été ouvert en Turquie
                </p>
                <ul>
                    <li>Capacité 2 682 lits</li>
                    <li>Il contient le plus grand isolateur sismique au monde</li>
                    <li>Équipé des dernières technologies</li>
                    <li>Assurer un service continu en cas de tremblement de terre</li>
                    <li>Superficie du bâtiment 1 000 000 mètres carrés</li>
                    <li>Le projet d'hôpital est le résultat du protocole de coopération entre les secteurs public et
                        privé et est le plus grand projet d'investissement dans le domaine de la santé en Turquie</li>
                </ul>
                <br>
                <br>
                <br>
                <br>

                <div class="right-side-description">
                    <h5 id="rs-des">TER Dakar</h5>
                </div>
                <img style="float: right; margin-left: 20px; border-radius: 15% 10%; width: 45vh; "
                    src="{{ asset('images/projects/dakar.jpg') }}">

                <p>
                    Le train TER Dakar est le premier train à grande vitesse d'Afrique de l'Ouest, le train express
                    régional qui relie la
                    capitale sénégalaise, Dakar, à l'aéroport international Blaise Dine, a entamé en décembre dernier
                    son premier voyage, permettant le transport de 115 000 personnes par jour, à travers 14 gares, avec
                    d'une vitesse maximale de 160 km, le train vise à désengorger la capitale, Dakar.</p>
                <p>
                    Selon les autorités gouvernementales : Le projet PPP est le résultat d'un montage financier innovant
                    basé sur un prêt concessionnel de 2% étalé sur 25 ans.
                </p>
                <br>
                <br>
                <br>
                <br>
                <br>

                <br>
                <div class="right-side-description">
                    <h5 id="rs-des">SINGAPORE SPORTS HUB</h5>
                </div>
                <img style="margin-right: 20px; float: left; border-radius: 15% 10%; width: 45vh; "
                    src="{{ asset('images/projects/singa.jpg') }}">

                <p>
                    SINGAPOUR SPORTS HUB est investissement performant d'une valeur en capital de 1,4 milliard de
                    dollars US,
                    le projet comprenait la construction d'un stade de sport de 55 000 places, d'un centre aquatique et
                    d'une arène intérieure polyvalente.
                </p>
                <p>La phase de construction a été achevée en 2014, le plus grand
                    partenariat public-privé de l'histoire de Singapour, c'était un projet de grande envergure.</p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="right-side-description">
                    <h5 id="rs-des">
                        Le partenariat public - privé
                    </h5>
                </div>
                <p>Le partenariat entre les secteurs public et privé appelé PPP vise à diversifier les
                    sources de financement des projets et à rémunérer les investissements publics Types de PPP
                    Partenariat institutionnel ou partenariat contractuel qui comprend des contrats d'engagement et des
                    contrats de partenariat</p>
                <p>Pourquoi recourons-nous au PPP ? </p>
                <p>Les capacités de l'Etat ne sont pas en mesure de réaliser et d'entretenir les
                    infrastructures et d'améliorer les équipements publics, mais le secteur privé détient le
                    financement, la conception, la construction, l'entretien, ....</p>
                <p>Qu'est-ce que PPP ?</p>
                <p>Il s'agit d'un contrat à durée déterminée entre une personne privée et une personne publique qui
                    comprend, en tout ou en partie, la conception, le financement, la réalisation, la préparation et
                    l'entretien d'un projet ayant pour objet la fourniture d'un service public.</p>
            </div>
            {{-- ***************************************************************************************************************** --}}
            {{-- ***************************************************************************************************************** --}}
        </div>

        <script src=" {{ asset('js/baseLeftSide.js') }} "></script>
        <script src=" {{ asset('js/windowAccess.js') }} "></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>

        <script>
            var videos = document.querySelectorAll('video');
            for (var i = 0; i < videos.length; i++)
                videos[i].addEventListener('play', function() {
                    pauseAll(this)
                }, true);


            function pauseAll(elem) {
                for (var i = 0; i < videos.length; i++) {
                    //Is this the one we want to play?
                    if (videos[i] == elem) continue;
                    //Have we already played it && is it already paused?
                    if (videos[i].played.length > 0 && !videos[i].paused) {
                        // Then pause it now
                        videos[i].pause();
                    }
                }
            }
        </script>
</body>

</html>
