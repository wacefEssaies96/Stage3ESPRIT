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
            <a id="dossiers" hidden href="{{ route('show.user.projects') }}"></a>
            <div class="item3" style="cursor: pointer;" onclick="goHome()">Acceuil</div>
            <div class="item2" style="cursor: pointer;">Profile</div>
            <div class="item3" style="cursor: pointer;" onclick="goDossiers()">Dossiers</div>
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
        <div class="containerr">
            {{-- <div class="row justify-content-center r"> --}}
            {{-- <div class="col-11 col-sm-9 col-md-7 col-lg-11 col-xl-11 text-center p-0 mt-3 mb-2"> --}}
            {{-- <div class="px-0 pt-4 pb-0 mt-3 mb-3"> --}}
            <form id="form" method="POST" action=" {{ route('update-profile', $user->id) }} "
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h3>Gérer mon profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="attachment">
                                    <h3 style="width:100%; vertical-align: middle;">Photo de profile</h3>
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
                            </div>
                            <div class="col">
                                <div class="form-item box-item">
                                    <input style="margin:0;" class="form-control" type="text" name="name"
                                        value="{{ $user->name }}" placeholder="Nom" data-required required>
                                    @error('name')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-item box-item">
                                    <input type="email" name="email" value="{{ $user->email }}"
                                        placeholder="E-mail" data-email data-required required>
                                    @error('email')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-item box-item">
                                    <div class="form-item-triple">
                                        <div class="radio-label">
                                            <label class="label">Genre</label>
                                        </div>
                                        <div class="form-item">
                                            <select name="gender" class="form-control">
                                                <option id="Male" value="Male">Male</option>
                                                <option id="Female" value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-item box-item">
                                    <div class="form-item-triple">
                                        <div class="radio-label">
                                            <label for="address">Municipalité</label>
                                        </div>
                                        <div class="form-item">
                                            <select class="form-control" style="float: right;" name="address">
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
                                    @error('address')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-item box-item">
                                    <input type="tel" name="phoneNbr" value="{{ $user->phoneNbr }}"
                                        placeholder="N° portable" pattern="[0-9]{8}" required>
                                    @error('phoneNbr')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                
                                <p onclick="remove()"
                                    style="border-radius: 20px; margin-left: 30%; margin-right: 30%; color:aliceblue; background-color: red; cursor: pointer;">
                                    Supprimer votre compte
                                </p>
                                
                                <div id="p"></div>

                                <p id="ppp" onclick="pass()" style="color: #fdc541; cursor: pointer;">
                                    Cliquer
                                    ici pour
                                    modifier le mot de passe</p>
                                <div id="pass">

                                </div>
                                @error('p')
                                    <span style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror
                                @error('pwd')
                                    <span style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror
                                @error('rePwd')
                                    <span style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                            <div class="col">
                                <div id="addons">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-item">
                            <button type="submit" id="submit" class="submit"
                                style="background-color:#fdc541 ;">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
            <form hidden method="POST" action="{{ route('user.destroy', $user->id) }}">
                @csrf
                @method('DELETE')
                <button hidden id="r" type="submit"></button>
            </form>
            {{-- ------------------ --}}
            {{-- ------------------ --}}
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
            var loadFile = function(event) {
                var image = document.getElementById('preview');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
            var user = {!! json_encode($user) !!};
            var v = {!! json_encode($v) !!};
            document.getElementById(user.gender).setAttribute('selected', '');
            document.getElementById(user.state).setAttribute('selected', '');
            if (user.type == 'Expert') {
                e();
                document.getElementById('service').value = v.service;
            }
            if (user.type == 'Investor') {
                i();
                document.getElementById('desc').value = v.description;
                document.getElementById('fond').value = v.fonds;
            }

            function goHome() {
                document.getElementById('home').click();
            }

            function logout() {
                document.getElementById('logout').click();
            }
            function goDossiers(){
                document.getElementById('dossiers').click();
            }

            function remove() {
                var retVal = confirm("Voulez-vous vraiment supprimer votre compte ?");
                if (retVal == true) {
                    document.getElementById('r').click();
                }
            }
        </script>

</body>

</html>
