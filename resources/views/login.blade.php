<!DOCTYPE html>
<html lang="fr&&">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('css/connect.css')}}">
    <title>Login - Fab Calendar</title>
</head>
<body>
    
    <div class="inner-page">
        <section class="part-1">
            <header class="container-fluid d-flex justify-content-between align-items-center">
                <span class="logo"> <img src="{{asset('img/logo1.png')}}" alt=""></span>
                <span class="login-up">
                    <button class="logup">Inscription</button>
                    <button class="login">Connexion</button>
                </span>
            </header>
            <section class="pt-5 row part-1_1 justify-content-center">
                <div class="text offset-md-1 col-md-5 col-lg-5 col-xs-12 col-sm-12">
                <h1> Avec Fab Calendar, <br> 
                        planifiez vos jours de cours en vous <br>
                        réservant un accès à la salle de travail
                </h1>

                <h1>Vite !!! Connectez-vous pour voir les différents <br>
                        jours et plages horaires disponibles
                </h1>
                </div>
                <div class="img col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <img src="/" alt="">
                </div>
            </section>
            <section class="part-1_2 mt-5">
                <button class="mt-2">Se connecter</button>
                <div class="text mt-5">Vous n’avez pas de compte ? <br>
                    Pas grave, vous pouvez toujours vous en créer un. <br> 
                    Il suffit cliquer ci-dessous
                </div>
                <button class="mt-1 mb-5">S'inscrire</button>
            </section>
        </section>
        <section class="part-2 forms-panel d-flex flex-column justify-content-center align-items-center">
            <form id="form" class="login-mode mt-5">
                <header>
                    <img src="/img/logo2.png" alt="">
                    <h2>Connection</h2>
                </header>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off">
                </div>
                <div class="form-group logup">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" autocomplete="off">
                </div>
                <div class="form-group logup">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" autocomplete="off">
                </div>
                <div class="form-group logup">
                    <label for="formasuiv">Formation Suivie</label>
                    <input type="text" id="formasuiv" name="formasuiv" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" autocomplete="off"> <i class="fas fa-eye"></i>
                </div>
                <div class="form-group logup">
                    <label for="mdp_confirm">Confirmation de mot de passe</label>
                    <input type="password" id="mdp_confirm" autocomplete="off"> <i class="fas fa-eye"></i>
                </div>
                <div class="mt-5 form-buttons d-flex flex-column align-items-center">
                    <button type="submit" class="active login-button">Se connecter</button>
                    <p>ou</p>
                    <button type="submit" class="logup-button">S'inscrire</button>
                </div>
            </form>
        </section> 
    
    
    </div>

    <script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/login.js')}}"></script>
</body>
</html>