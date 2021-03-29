<!DOCTYPE html>
<html lang="fr&&">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ secure_asset('css/connect.css')}}">
    <title>Lien Expiré - Fab Calendar</title>
</head>

<body>
    <div class="inner-page">
        <section class="part-1">
            <header class="container-fluid d-flex justify-content-between align-items-center">
                <span class="logo"> <img src="{{secure_asset('img/logo1.png')}}" alt=""></span>
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
    <script src="{{ secure_asset('js/jquery-3.5.1.min.js')}}"></script>
    <script>
        $('header button').click(function() {
            window.location.href = this.dataset.target;
        })
    </script>
</body>

</html>