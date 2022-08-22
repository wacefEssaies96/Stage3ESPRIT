<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gérer mon compte</title>

    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/_client/profileStructure.css') }}">
    <link rel="stylesheet" href="{{ asset('css/_client/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/image.css') }}">

</head>

<body>
    {{-- ############################################### --}}
    <div class="page-content">
        {{-- ------------------ --}}
        <div class="left-menu">
            <a id="home" hidden href="{{ route('home') }}">Acceuil</a>
            <a id="logout" hidden href="{{ route('logout') }}">Déconnexion</a>
            <div class="item1" style="cursor: pointer;" onclick="goHome()">Acceuil</div>
            <div class="item2" style="cursor: pointer;">Conditature</div>
            <div class="item3" style="cursor: pointer;" onclick="logout()">Déconnexion</div>
        </div>
        {{-- ------------------ --}}
        {{-- ------------------ --}}

        <div class="page-header">
            <div class="logo" onclick="goHome()" style="cursor: pointer;">
                <img id="logo" src="{{ asset('images/logo.png') }}">
            </div>
            <div class="notification">
                <i style="font-size:18px; color: #9c9c9c;" class="fa">&#xf0a2;</i>
            </div>
            <div class="user_name">
                {{ Auth::user()->name }}
            </div>
            <div class="user_img">
                @if ($user->image == ' ')
                    <img src="{{ asset('images/man.png') }}" alt="ERROR" width="48" height="48">
                @else
                    <img style="border-radius: 50%;" src="{{ asset('upload/' . $user->image . '') }}" alt="ERROR"
                        width="48" height="48">
                @endif
            </div>
        </div>
        {{-- ------------------ --}}
        {{-- ------------------ --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-9 col-md-7 col-lg-11 col-xl-11 text-center p-0 mt-3 mb-2">
                    <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                        <form id="form" method="POST" action=" {{ route('update-profile', $user->id) }} "
                            enctype="multipart/form-data">
                            @csrf
                            <ul id="progressbar">
                                <li class="active" id="step1">
                                    <strong>Étape 1</strong>
                                </li>
                                <li id="step2">
                                    <strong>Étape 2</strong>
                                </li>
                                <li id="step3">
                                    <strong>Étape 3</strong>
                                </li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div> <br>
                            <fieldset>
                                {{-- 1st fieldset content --}}
                                <div class="fields mt-3">
                                    <div class="center">
                                        <div class="input-field mt-3">
                                            <div class="border-bottom"></div>
                                            <label for="name">Nom</label>
                                            <input id="name" name="name" type="text" placeholder="Nom"
                                                autocomplete="off" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="center">
                                        <div class="input-field mt-3">
                                            <div class="border-bottom"></div>
                                            <label for="email">Email</label>
                                            <input id="email" name="email" type="text" placeholder="Email"
                                                autocomplete="off" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="center">
                                        <div class="input-field mt-3">
                                            <div class="border-bottom"></div>
                                            <div class="row ml-1">
                                                <div class="col-sm-5">
                                                    <label for="gendre">Sexe</label>
                                                </div>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="gender">
                                                        <option id="Male" value="Male">Homme</option>
                                                        <option id="Female" value="Female">Femme</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="center">
                                        <div class="input-field mt-3">
                                            <div class="border-bottom"></div>
                                            <div class="row ml-1">
                                                <div class="col-sm-5">
                                                    <label for="state">Etat</label>
                                                </div>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="address">
                                                        <option id="Tunis" value="Tunis">Tunis</option>
                                                        <option id="Ariana" value="Ariana">Ariana</option>
                                                        <option id="Ben Arous" value="Ben Arous">Ben Arous</option>
                                                        <option id="Mannouba" value="Mannouba">Mannouba</option>
                                                        <option id="Bizerte" value="Bizerte">Bizerte</option>
                                                        <option id="Nabeul" value="Nabeul">Nabeul</option>
                                                        <option id="Béja" value="Béja">Béja</option>
                                                        <option id="Jendouba" value="Jendouba">Jendouba</option>
                                                        <option id="Zaghouan" value="Zaghouan">Zaghouan</option>
                                                        <option id="Siliana" value="Siliana">Siliana</option>
                                                        <option id="Kef" value="Kef">Kef</option>
                                                        <option id="Sousse" value="Sousse">Sousse</option>
                                                        <option id="Monastir" value="Monastir">Monastir</option>
                                                        <option id="Mahdia" value="Mahdia">Mahdia</option>
                                                        <option id="Kasserine" value="Kasserine">Kasserine</option>
                                                        <option id="Sidi Bouzid" value="Sidi Bouzid">Sidi Bouzid
                                                        </option>
                                                        <option id="Kairouan" value="Kairouan">Kairouan</option>
                                                        <option id="Gafsa" value="Gafsa">Gafsa</option>
                                                        <option id="Sfax" value="Sfax">Sfax</option>
                                                        <option id="Gabès" value="Gabès">Gabès</option>
                                                        <option id="Médenine" value="Médenine">Médenine</option>
                                                        <option id="Tozeur" value="Tozeur">Tozeur</option>
                                                        <option id="Kebili" value="Kebili">Kebili</option>
                                                        <option id="Tataouine" value="Tataouine">Tataouine</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="center">
                                        <div class="input-field mt-3">
                                            <div class="border-bottom"></div>
                                            <label for="tel">télèphone</label>
                                            <input id="phoneNbr" name="phoneNbr" type="text"
                                                placeholder="12345678" autocomplete="off"
                                                value="{{ $user->phoneNbr }}">
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="next-step" class="next-step" value="Suivant" />
                                {{-- End 1st fieldset --}}
                            </fieldset>
                            <fieldset>
                                {{-- 2nd fieldset content --}}
                                <div class="attachment">
                                    <h3 style="width:100%; vertical-align: middle;">Image à transférer</h3>
                                    <div class="icon">
                                        @if ($user->image == ' ')
                                            <img id="preview" src="{{ asset('images/upload-file.png') }}"
                                                alt="NO IMAGE">
                                        @else
                                            <img id="preview" src="{{ asset('upload/' . $user->image . '') }}"
                                                alt="{{ $user->image }}">
                                        @endif

                                    </div>
                                    <div class="addBtn">
                                        <button class="trigger">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <input id="uploadedFiles" type="file" name="file"
                                                onchange="loadFile(event)">
                                        </button>
                                    </div>
                                </div>
                                <input type="button" name="next-step" class="next-step" value="Suivant" />
                                <input type="button" name="previous-step" class="previous-step"
                                    value="Précédent" />
                                {{-- End 2nd fieldset --}}
                            </fieldset>
                            <fieldset>
                                {{-- Last fieldset content --}}
                                <div class="finish">
                                    <h2 class="text text-center">
                                        <div class="container">
                                            <div class="row">
                                                @if ($projects->count() == 0)
                                                    @if (Auth::user()->type == 'Client')
                                                        <h1 style="color: red;">Vous n'avez déposé aucun projet !</h1>
                                                        <h3><a style="color: #FCB918;"
                                                                href="{{ route('uploadF', Auth::user()->id) }}">Cliquer
                                                                ici pour déposer un dossier.</a></h3>
                                                    @else
                                                        <h1 style="color: red;">Vous ne pouvez pas déposer des dossiers
                                                            en tant que {{ Auth::user()->type }} !</h1>
                                                        <h3><a style="color: #FCB918;"
                                                                href="{{ route('sign-up') }}">Cliquer ici pour créer
                                                                un compte Client et pouvoir déposer des dossiers.</a>
                                                        </h3>
                                                    @endif
                                                @else
                                                    @foreach ($projects as $item)
                                                        <div class="col-sm">
                                                            <div class="card" style="width: 18rem;">
                                                                <img class="card-img-top"
                                                                    src="{{ asset('images/project.png') }}"
                                                                    alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $item->proTitle }}</h5>
                                                                    <p class="card-text">{{ $item->proDesc }}</p>
                                                                    <a href="{{ route('edit.dossier', [$item->id]) }}"
                                                                        class="btn btn-warning">Modifier</a>
                                                                    <a href="{{ route('remove-file', [$item->id]) }}"
                                                                        class="btn btn-danger">Supprimer</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </h2>
                                </div>
                                <input type="button" name="previous-step" class="previous-step"
                                    value="Précédent" />

                                {{-- End last fieldset --}}
                            </fieldset>
                            <button class="btn btn-success" type="submit"
                                onclick="window.location='{{ route('update-profile', $user->id) }}'">Sauvegarder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------------------ --}}
        {{-- ------------------ --}}
    </div>
    {{-- ############################################### --}}

    <script src="{{ asset('js/_client/profileSPB.js') }}"></script>
    <script src="{{ asset('js/_client/profileFields.js') }}"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var user = {!! json_encode($user) !!};
        document.getElementById(user.gender).setAttribute('selected', '');
        document.getElementById(user.state).setAttribute('selected', '');
    </script>
</body>

</html>
