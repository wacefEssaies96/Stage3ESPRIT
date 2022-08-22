<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Créer votre compte</title>

    <link rel="stylesheet" href=" {{ asset('css/connexion/addUser.css') }} ">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background-color:'white';">

    <div class="row">
        <section class="section">
            <header>
                <h3>Créer un compte</h3>
                <h4>Veuillez remplir tous les champs convenablement. </h4>
            </header>

            <main>
                <form method="POST" action=" {{ route('user.store') }} ">
                    @csrf
                    <div class="form-item box-item">
                        <input type="text" name="name" placeholder="Nom" data-required required>
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div class="form-item box-item">
                        <input type="email" name="email" placeholder="E-mail" data-email data-required required>
                        @error('email')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div class="form-item box-item">
                        <div class="form-item-triple">
                            <div class="radio-label"> 
                                <label class="label">Genre</label>
                            </div>
                            <div class="form-item"> 
                                <input id="Male" type="radio" name="gender" value="Male" data-once>
                                <label for="Male">Homme</label>
                            </div>
                            <div class="form-item"> 
                                <input id="Female" type="radio" name="gender" value="Female" data-once>
                                <label for="Female">Femme</label>
                            </div>
                        </div>
                        @error('gender')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div class="form-item box-item">
                        <div class="form-item-triple">
                            <div class="radio-label"> 
                                <label class="label">Type</label>
                            </div>
                            <div class="form-item"> 
                                <input id="client" type="radio" name="gender2" value="Admin" onclick="c()" data-once>
                                <label for="client">Admin</label>
                            </div>
                            <div class="form-item"> 
                                <input id="client" type="radio" name="gender2" value="Client" onclick="c()" data-once>
                                <label for="client">Client</label>
                            </div>
                            <div class="form-item"> 
                                <input id="investor" type="radio" name="gender2" value="Investor" onclick="i()" data-once>
                                <label for="investor">Investisseur</label>
                            </div>
                            <div class="form-item"> 
                                <input id="expert" type="radio" name="gender2" value="Expert" onclick="e()" data-once>
                                <label for="expert">Expert</label>
                            </div>
                        </div>
                        @error('gender2')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div class="form-item box-item">
                        <label style="color: #fdc541;" for="address">Municipalité</label>
                        <select style="float: right;" name="address">
                            <option value="Tunis">Tunis</option>
                            <option value="Ariana">Ariana</option>
                            <option value="Ben Arous">Ben Arous</option>
                            <option value="Mannouba">Mannouba</option>
                            <option value="Bizerte">Bizerte</option>
                            <option value="Nabeul">Nabeul</option>
                            <option value="Béja">Béja</option>
                            <option value="Jendouba">Jendouba</option>
                            <option value="Zaghouan">Zaghouan</option>
                            <option value="Siliana">Siliana</option>
                            <option value="Kef">Kef</option>
                            <option value="Sousse">Sousse</option>
                            <option value="Monastir">Monastir</option>
                            <option value="Mahdia">Mahdia</option>
                            <option value="Kasserine">Kasserine</option>
                            <option value="Sidi Bouzid">Sidi Bouzid</option>
                            <option value="Kairouan">Kairouan</option>
                            <option value="Gafsa">Gafsa</option>
                            <option value="Sfax">Sfax</option>
                            <option value="Gabès">Gabès</option>
                            <option value="Médenine">Médenine</option>
                            <option value="Tozeur">Tozeur</option>
                            <option value="Kebili">Kebili</option>
                            <option value="Tataouine">Tataouine</option>
                        </select>
                        @error('address')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror                   
                     </div>
                    <div class="form-item-double box-item">
                        <div class="form-item ">
                            <input type="password" name="pwd" placeholder="Mot de passe" data-required required>
                            @error('pwd')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <input type="password" name="rePwd" placeholder="Confirmer votre mot de passe" data-required required>
                            @error('rePwd')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-item box-item">
                        <input type="tel" name="phoneNbr" placeholder="N° portable" required>
                        @error('phoneNbr')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div id="addons">
                        
                    </div>
                    <div class="form-item">
                        <button type="submit" id="submit" class="submit">Enregistrer</button>
                        <button type="button" class="fa fa-remove" onclick="reset()"></button>
                    </div>
                </form>
            </main>
            <i class="wave"></i>
        </section>
    </div>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/connexion/addUser.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>