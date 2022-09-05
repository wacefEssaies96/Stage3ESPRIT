<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gérer mon compte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="{{ asset('images/logoapp.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/_client/profileStructure.css') }}">
    <link rel="stylesheet" href="{{ asset('css/_client/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/image.css') }}">
    {{-- <link rel="stylesheet" href=" {{ asset('css/connexion/addUser.css') }} "> --}}
    <link rel="stylesheet" href=" {{ asset('css/modals/successModal.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/modals/failModal.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/_client/upload-notification.css') }} ">

</head>

<body>
    {{-- ############################################### --}}
    <div class="page-content">
        {{-- ------------------ --}}
        <div class="left-menu">
            <a id="home" hidden href="{{ route('home') }}"></a>
            <a id="logout" hidden href="{{ route('logout') }}"></a>
            <a id="profile" hidden href="{{ route('user.show', Auth::user()->id) }}"></a>
            <div class="item3" style="cursor: pointer;" onclick="goHome()">Acceuil</div>
            <div class="item3" style="cursor: pointer;" onclick="goProfile()">Profile</div>
            <div class="item2" style="cursor: pointer;">Dossiers</div>
            <div class="item3" style="cursor: pointer;" onclick="logout()">Déconnexion</div>
        </div>
        {{-- ------------------ --}}
        {{-- ------------------ --}}

        <div class="page-header">
            <div class="logo">
                <a href="{{ route('home') }}"><img style="max-height: 50px;" src="{{ asset('images/logo.png') }}"></a>
            </div>
            <div class="notification">
                @if ($message = Session::get('success'))
                    <div class="push-success-notification">
                        <i class="bell fa"><a href="#success_tic" data-target="#success_tic"
                                data-toggle="modal">&#xf0f3;</a></i>
                    </div>
                    <!-- Modal -->
                    <div id="success_tic" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <a class="close" href="#" data-dismiss="modal">&times;</a>
                                <div class="page-body">
                                    <div class="head">
                                        <h3 style="margin-top:5px;">{{ $message }}</h3>
                                        {{-- <h4>Lorem ipsum dolor sit amet</h4> --}}
                                    </div>

                                    <h1 style="text-align:center;">
                                        <div class="checkmark-circle">
                                            <div class="background"></div>
                                            <div class="checkmark draw"></div>
                                        </div>
                                        <h1>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="push-fail-notification">
                        <i class="bell fa"><a href="#fail" data-target="#fail" data-toggle="modal">&#xf0f3;</a></i>
                    </div>
                    <!-- Modal HTML -->
                    <div id="fail" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <div class="icon-box">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body text-center">
                                    <h4>Ooops!</h4>
                                    <p>{{ $message }}</p>
                                    <button class="btn btn-success" data-dismiss="modal">
                                        Réessayer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="user_name">
                {{ Auth::user()->name }}
            </div>
            <div class="user_img">
                @if (Auth::user()->image == ' ')
                    <img src="{{ asset('images/man.png') }}" alt="ERROR" width="48" height="48">
                @else
                    <img style="border-radius: 50%;" src="{{ asset('upload/' . Auth::user()->image . '') }}"
                        alt="ERROR" width="48" height="48">
                @endif
            </div>
        </div>
        <div class="containerr">

            <div class="card">
                <div class="card-header">
                    <h3>Gérer mes dossiers</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        @if ($projects->count() == 0)
                            @if (Auth::user()->type == 'Client')
                                <h1 style="color: red;">Vous n'avez déposé aucun projet !</h1>
                                <h3><a style="color: #FCB918;"
                                        href="{{ route('uploadF', Auth::user()->id) }}">Cliquer ici pour déposer un
                                        dossier.</a></h3>
                            @else
                                <h1 style="color: red;">Vous ne pouvez pas déposer des dossiers en tant que
                                    {{ Auth::user()->type }} !</h1>
                                <h3><a style="color: #FCB918;" href="{{ route('sign-up') }}">Cliquer ici pour créer
                                        un compte Client et pouvoir déposer des dossiers.</a></h3>
                            @endif
                        @else
                            @foreach ($projects as $item)
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset('images/project.png') }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->proTitle }}</h5>
                                            <p class="card-text">{{ $item->proDesc }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <form action="{{ route('remove-file', [$item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('edit.dossier', [$item->id]) }}"
                                                    class="btn btn-warning">Modifier</a>
                                                <button class="btn btn-danger" type="submit">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ############################################### --}}
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/connexion/addUser.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        function goHome() {
            document.getElementById('home').click();
        }

        function goProfile() {
            document.getElementById('profile').click();
        }

        function logout() {
            document.getElementById('logout').click();
        }
    </script>

</body>

</html>
