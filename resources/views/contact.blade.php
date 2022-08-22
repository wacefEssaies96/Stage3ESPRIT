<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nous contacter</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href=" {{ asset('css/contact/contact.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/contact/util.css') }} ">

    <script src=" {{ asset('js/windowAccess.js') }} "></script>

</head>

<body>

    <div class="container-contact100">
        <button class="contact100-btn-show">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
        </button>
        <div class="wrap-contact100">
            <button class="contact100-btn-hide">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
            <form class="contact100-form validate-form" autocomplete="off">
                <span class="contact100-form-title">
                    Contacter Nous
                </span>
                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Le nom est obligatoire">
                    <span class="label-input100">Votre nom</span>
                    <input class="input100" type="text" name="name" placeholder="Taper votre nom">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 rs1-wrap-input100 validate-input"
                    data-validate="L'e-mail est obligatoire: ex@abc.xyz">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="email" placeholder="Tapez votre e-mail">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Le message ne doit pas etre vide">
                    <span class="label-input100">Message</span>
                    <textarea class="input100" name="message" placeholder="Votre message ici..."></textarea>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        <span>
                            Envoyer
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
            <span class="fa fa-home" style="padding-left: 5%; padding-right: 5%">
                <a style="text-decoration-line: none; font-family: Poppins-Medium; color: #FCB918"
                    href="{{ route('home') }}">Page d'acceuil</a>
            </span>
            <span class="contact100-more">
                Vous pouvez poser vos questions à nos responsables: <span class="contact100-more-highlight">+216 00 000
                    000</span>
            </span>
        </div>
    </div>

    <script src=" {{ asset('js/jquery-3.2.1.min.js') }} "></script>
    <script src=" {{ asset('js/contact.js') }} "></script>

</body>

</html>
