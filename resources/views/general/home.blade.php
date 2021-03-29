<!DOCTYPE html>
<html lang="fr&&">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ secure_asset('css/connect.css')}}">
    <title>Accueil - Fab Calendar</title>
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
            <section class="pt-5 row part-1_1 justify-content-center">
                <div class="text offset-md-1 col-md-5 col-lg-5 col-xs-12 col-sm-12">
                    <h1 class=""> Avec Fab Calendar, <br>
                        planifiez vos jours de cours en vous <br>
                        réservant un accès à la salle de travail
                    </h1>

                    <h1 class="mt-5">Vite !!! Connectez-vous pour voir les différents <br>
                        jours et plages horaires disponibles
                    </h1>
                </div>
                <div class="img col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <img src="/img/welcome-img.svg" alt="">
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
    </div>

    <script src="{{ secure_asset('js/jquery-3.5.1.min.js')}}"></script>
    <script>
        $('header button').click(function() {
            window.location.href = this.dataset.target;
        })
    </script>
</body>

</html>