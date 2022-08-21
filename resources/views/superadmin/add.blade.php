<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Créer votre compte</title>

    <script language="JavaScript" type="text/javascript" src="{{ asset('js/connexion/addUser.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                        <input type="text" name="name" placeholder="Nom" data-required>
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div class="form-item box-item">
                        <input type="email" name="email" placeholder="E-mail" data-email data-required>
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
                                <input id="client" type="radio" name="gender2" value="Admin" data-once>
                                <label for="client">Admin</label>
                            </div>
                            <div class="form-item"> 
                                <input id="client" type="radio" name="gender2" value="Client" data-once>
                                <label for="client">Client</label>
                            </div>
                            <div class="form-item"> 
                                <input id="investor" type="radio" name="gender2" value="Investor" data-once>
                                <label for="investor">Investisseur</label>
                            </div>
                            <div class="form-item"> 
                                <input id="expert" type="radio" name="gender2" value="Expert" data-once>
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
                        <input type="text" name="address" placeholder="Municipalité" data-required>
                        @error('address')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror                   
                     </div>
                    <div class="form-item-double box-item">
                        <div class="form-item ">
                            <input type="password" name="pwd" placeholder="Mot de passe" data-required>
                            @error('pwd')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <input type="password" name="rePwd" placeholder="Confirmer votre mot de passe" data-required>
                            @error('rePwd')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-item box-item">
                        <input type="tel" name="phoneNbr" placeholder="N° portable">
                        @error('phoneNbr')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
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
    
</body>
</html>