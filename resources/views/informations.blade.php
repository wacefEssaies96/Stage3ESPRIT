@extends('layout.client')
@section('title', 'Informations')
@section('content')
    <div class="right-side">
        <div class="right-side-id">
            {{-- <div class="_id">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#818282"
                class="bi bi-headset" viewBox="0 0 16 16">
                <path
                    d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
            </svg>
            <h3>Projects</h3>
        </div> --}}
            <div class="b_right-side-id"></div>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <center><img class="d-block w-50" src="{{ asset('images/images/éligibilité.jpg') }}" alt="First slide">
                    </center>
                </div>
                <div class="carousel-item">
                    <center><img class="d-block w-50" src="{{ asset('images/offre.png') }}" alt="Second slide"></center>
                </div>
                <div class="carousel-item">
                    <center><img class="d-block w-50" src="{{ asset('images/contenu.jpg') }}" alt="Third slide"></center>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>

        <br>

        <br>
        <div class="right-side-description">
            <h5 id="rs-des">Définition des PPP</h5>
        </div>
        <div>
            <p>
                Le partenariat public-privé (PPP) est un mode de financement par lequel une autorité publique fait appel à
                des prestataires privés pour financer et gérer un équipement assurant ou contribuant au service public. Le
                partenaire privé reçoit en contrepartie un paiement du partenaire public et/ou des usagers du service qu'il
                gère. Ce mode de financement est présent dans de nombreux pays sous des formes variées.
            </p>


            <p>
                Le contrat de partenariat s’inscrit dans le champ de la commande publique. En application de l’article 3 de
                <a href="{{ asset('files/Loi2015-49.pdf') }}" target="_blank">la loi de 2015-49</a>, le contrat de
                partenariat
                implique nécessairement la présence d’une personne publique.
            </p>
            <div class="right-side-description">
                <h5 id="rs-des">Pourquoi les PPP ?</h5>
            </div>
            <p>
                L’État est sollicité par les « Citoyens » pour mettre en place des services «socio – économiques » avec 3
                contraintes fortes:
            </p>
            <ul>
                <li>Délai rapide de mise en place du service,</li>
                <li>Coût moindre,</li>
                <li>Qualité de service satisfaisante.</li>
            </ul>
            <div class="right-side-description">
                <h5 id="rs-des">Objectifs des PPP</h5>
            </div>
            <ul>
                <li>Envisager les PPP comme un moyen d'introduire la technologie et l'innovation du secteur privé afin de
                    proposer des services publics de meilleure qualité grâce à une meilleure efficacité opérationnelle;</li>
                <li>Encourage le secteur privé à fournir les projets dans les délais et le budget impartis;</li>
                <li>Imposer un certain degré de certitude budgétaire en définissant les coûts des projets d'infrastructure
                    présents et à venir au cours du temps;</li>
                <li>Utiliser les PPP comme un moyen de développer les capacités du secteur privé local par l'intermédiaire
                    d'une propriété conjointe avec de grandes entreprises internationales, ainsi que comme une possibilité
                    de sous-traitance pour les entreprises locales dans des domaines tels que les travaux publics, les
                    travaux électriques, la gestion des équipements, les services de sécurité, les services de nettoyage,
                    les services d'entretien, etc.;</li>
                <li>Diversifier l'économie grâce à une meilleure compétitivité du pays au niveau de la simplification de
                    la base des infrastructures, ainsi que stimuler son commerce et son industrie associés au développement
                    des infrastructures (tels que la construction, l'équipement, les services de soutien, etc.);</li>
                <li>Compléter les capacités limitées du secteur public pour répondre à la demande croissante en
                    développement des infrastructures;</li>
                <li>Dégager un rapport qualité-prix à long terme grâce à un transfert de risques adéquat vers le secteur
                    privé tout au long du projet : de la conception/construction à l'exploitation/l'entretien.</li>
            </ul>
            <div class="right-side-description">
                <h5 id="rs-des">Partenariats public-privé: qu’est-ce que c’est ?</h5>
            </div>
            <p>
                En 2007, la Tunisie a connu sa première loi dédiée aux PPP, la loi d’orientation n° 2007-13 du 19 février
                2007, relative à l’économie numérique.
            </p>
            <p>
                En 2008, le législateur tunisien a unifié dans une certaine mesure le régime des concessions sous la Loi n°
                2008-23 du 1er avril 2008, relative au régime des concessions.
            </p>
            <p>
                En 2015, le législateur tunisien a complété la loi relative aux concessions avec une loi spécifique aux
                contrats de partenariats : <a href="{{ asset('files/Loi2015-49.pdf') }}" target="_blank">la loi n°
                    49-2015</a> du 27 novembre 2015, relative aux contrats de Partenariats
                Public Privé et ses textes d’application suivants :
            </p>
            <ul>
                <li>Le <a href="{{ asset('files/Décret G 2016-771.pdf') }}" target="_blank">décret n°771</a> du 20 juin
                    2016, portant composition et prérogatives du Conseil Stratégique des
                    contrats de partenariats public-privé</li>
                <li>Le <a href="{{ asset('files/Décret G 2016-772.pdf') }}" target="_blank">décret n°772</a> du 20 juin
                    2016, portant fixation des conditions et des procédures d’octroi des
                    contrats de partenariats public-privé.</li>
                <li>Le <a href="{{ asset('files/Décret G 2016-782.pdf') }}" target="_blank">décret n°782</a> du 20 juin
                    2016, portant sur les modalités de la tenue du registre des droits réels
                    grevant les constructions, ouvrages et équipements fixes édifiés dans le cadre des contrats de
                    partenariats public-privé.</li>
                <li>Le <a href="{{ asset('files/Décret G 2016-1104.pdf') }}" target="_blank">décret n°1104</a> du 4 juillet
                    2016, portant conditions et modalités de fixation de la contrepartie à
                    régler par la personne publique à la société de projet, et fixation des conditions et modalités de
                    cession et de nantissement des créances relatives aux contrats de partenariats public-privé.</li>
                <li>Le décret n°1185 du 14 octobre 2016, portant organisation et prérogatives de l’Instance Générale des
                    Partenariats Public Privé.</li>
            </ul>
            <p>
                L'un des objectifs visés par le nouveau cadre juridique et institutionnel des partenariats public-privé est
                de réduire les inégalités de développement entre les régions de la Tunisie. Pour faire face à ce défi,
                l'Etat doit investir de manière drastique dans les infrastructures et les superstructures qui sont l’un des
                piliers du développement économique et de l’amélioration des conditions de vie.
            </p>

            <div class="right-side-description">
                <h5 id="rs-des">Partenariat Public-Privé</h5>
            </div>
            <p>
                Définition du contrat de partenariat selon <a href="{{ asset('files/Loi2015-49.pdf') }}" target="_blank">la
                    Loi 49-2015</a> relative aux contrats de partenariat Public Privé
                telle que modifiée par <a href="{{ asset('files/Loi2019_47.pdf') }}" target="_blank">la loi n°2019-47</a>
                du
                29 mai 2019 relative à l’amélioration du climat des affaires.
            </p>
            <div class="right-side-description">
                <h5 id="rs-des">Concession</h5>
            </div>

            <p>Au sens de la Loi n° 2008-23 du 1er avril 2008, relative au régime des concessions telle que modifiée par la
                loi n°2019-47 du 29 mai 2019 relative à l’amélioration du climat de l’investissement:</p>
            <p>La concession est le contrat par lequel une personne publique dénommée "concédant" délègue, pour une durée
                limitée, à une personne publique ou privée dénommée « concessionnaire », la gestion d'un service public ou
                l'utilisation et l'exploitation des domaines ou des outillages publics en contrepartie de rémunération qu'il
                perçoit sur les usagers à son profit dans les conditions fixées par le contrat.</p>
            <p>Le concessionnaire peut être en plus chargé de la réalisation, la modification ou l'extension des
                constructions, ouvrages et installations ou d'acquérir des biens nécessaires à l'exécution de l'objet du
                contrat.</p>
            <p>Le contrat peut autoriser le concessionnaire à occuper des parties du domaine revenant au concédant afin de
                réaliser, de modifier ou d'étendre les constructions, ouvrages et installations susvisés. </p>
            <p>L'occupation temporaire du domaine public ne constitue pas, au sens de la présente loi, une concession. </p>
            <div class="right-side-description">
                <h5 id="rs-des">L'éligibilté aux contrats de partenariat</h5>
            </div>

            <p>Au sens de la Loi n° 2008-23 du 1er avril 2008, relative au régime des concessions telle que modifiée par la
                loi n°2019-47 du 29 mai 2019 relative à l’amélioration du climat de l’investissement:</p>
            <p>La concession est le contrat par lequel une personne publique dénommée "concédant" délègue, pour une durée
                limitée, à une personne publique ou privée dénommée « concessionnaire », la gestion d'un service public ou
                l'utilisation et l'exploitation des domaines ou des outillages publics en contrepartie de rémunération qu'il
                perçoit sur les usagers à son profit dans les conditions fixées par le contrat.</p>
            <p>Le concessionnaire peut être en plus chargé de la réalisation, la modification ou l'extension des
                constructions, ouvrages et installations ou d'acquérir des biens nécessaires à l'exécution de l'objet du
                contrat.</p>
            <p>Le contrat peut autoriser le concessionnaire à occuper des parties du domaine revenant au concédant afin de
                réaliser, de modifier ou d'étendre les constructions, ouvrages et installations susvisés. </p>
            <p>L'occupation temporaire du domaine public ne constitue pas, au sens de la présente loi, une concession. </p>

        </div>
        {{-- ***************************************************************************************************************** --}}
        {{-- ***************************************************************************************************************** --}}
    </div>
@endsection
