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
    <link rel="stylesheet" href=" {{ asset('css/connexion/addUser.css') }} ">

</head>

<body>
    {{-- ############################################### --}}
    <div class="page-content">
        {{-- ------------------ --}}
        <div class="left-menu">
            <a id="home" hidden href="{{ route('home') }}">Acceuil</a>
            <a id="logout" hidden href="{{ route('logout') }}">Déconnexion</a>
            <div class="item1" style="cursor: pointer;" onclick="goHome()">Acceuil</div>
            <div class="item2" style="cursor: pointer;">Profile</div>
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
                        <div class="profile" style="padding-left:15%; padding-right:15% ;">
                            <form id="form" method="POST" action=" {{ route('update-profile', $user->id) }} "
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-item box-item">
                                    <input style="margin:0;" type="text" name="name" value="{{ $user->name }}"
                                        placeholder="Nom" data-required required>
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
                                            <select name="gender">
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
                                            <label style="color: #fdc541;" for="address">Municipalité</label>
                                        </div>
                                        <div class="form-item">
                                            <select style="float: right;" name="address">
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
                                <div id="addons">

                                </div>
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
                                <div id="p">

                                </div>

                                <p id="ppp" onclick="pass()" style="color: #fdc541; cursor: pointer;">Cliquer ici pour
                                    modifier le mot de passe</p>

                                
                                <div id="pass">

                                </div>
                                <p onclick="remove()" style="border-radius: 20px; margin-left: 30%; margin-right: 30%; color:aliceblue; background-color: red; cursor: pointer;">Supprimer votre compte
                                </p>
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
                                <div class="form-item">
                                    <button type="submit" id="submit" class="submit"
                                        style="background-color:#fdc541 ;">Enregistrer</button>
                                </div>
                            </form>
                            <form hidden method="POST" action="{{ route('user.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button id="r" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------------------ --}}
        {{-- ------------------ --}}
    </div>
    {{-- ############################################### --}}
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/connexion/addUser.js') }}"></script>

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
        function remove(){
            document.getElementById('r').click();
        }
    </script>

</body>

</html>
