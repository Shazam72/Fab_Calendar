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
        <section class="part-2 forms-panel d-flex flex-column justify-content-center align-items-center">
            <form id="form" class="login-mode mt-5">
                @csrf
                <header>
                    <img src="/img/logo2.png" alt="">
                    <h2>Connection</h2>
                </header>
                <div class="form-group logup">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" autocomplete="off">

                    <p class="nom error-msg"></p>

                </div>
                <div class="form-group logup">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" autocomplete="off">

                    <p class="prenom error-msg"></p>

                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off">

                    <p class="email error-msg"></p>

                </div>
                <div class="form-group logup">
                    <label for="formasuiv" id="formasuiv_label">Formation Suivie</label>
                    <select type="text" id="formasuiv" name="formasuiv" autocomplete="off">
                        @foreach($formations as $formation)
                        <option value="{{$formation->id}}">{{$formation->formation}}</option>
                        @endforeach
                    </select>

                    <p class="formasuiv error-msg"></p>

                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" autocomplete="off"> <i class="fas fa-eye"></i>

                    <p class="password error-msg"></p>

                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation de mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="off"> <i class="fas fa-eye"></i>

                    <p class="password_confirmation error-msg"></p>

                </div>
                <div class="mt-5 form-buttons d-flex flex-column align-items-center">
                    <button type="submit" data-target="{{ route('login_treat') }}" class="active login-button">Se connecter</button>
                    <p>ou</p>
                    <button type="submit" data-target="{{ route('login_treat') }}" class="logup-button">S'inscrire</button>
                </div>
            </form>
        </section>


    </div>

    <script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/login.js')}}"></script>
</body>

</html>