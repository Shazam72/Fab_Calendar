<!DOCTYPE html>
<html lang="fr&&">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('css/connect.css')}}">
    <title>Lien Expiré - Fab Calendar</title>
</head>

<body>
    <div class="inner-page">
        <section class="part-1">
            <header class="container-fluid d-flex justify-content-between align-items-center">
                <span class="logo"> <img src="{{asset('img/logo1.png')}}" alt=""></span>
                <span class="login-up">
                    <button class="logup" data-target="{{ route('logup_form') }}">Inscription</button>
                    <button class="login" data-target="{{ route('login_form') }}">Connexion</button>
                </span>
            </header>
            <section class="container d-flex justify-content-between align-items-center confirm">
                <div class="text-dark text-center my-5 confirm-msg">
                    <h4 class="bg-danger text-white">Lien Expiré</h4>
                    <p class="p-3 bg-white" >
                        Le lien que vous utilisez est à présent expiré.<br>
                        Veuillez vous inscrire vie le formulaire d'inscription ou <br>
                        vous pouvez contacter l'administratateur afin de résoudre ce probème.<br>
                        <a href=" {{ route('contact') }}" class="btn btn-primary fs-1 my-5">Contacter l'administrateur</a>
                    </p>
                </div>
            </section>
        </section>
    </div>


    <footer class="p-5 d-flex justify-content-center align-items-center w-100">
        <div class="inner-footer d-flex justify-content- align-items-center">
            <span>
                &copy;Copyright Simplon 2021 - Politiques et Confidentialités
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span>
                Tous droits Réservés
            </span>
        </div>
    </footer>
    <script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
    <script>
        $('header button').click(function() {
            window.location.href = this.dataset.target;
        })
    </script>
</body>

</html>