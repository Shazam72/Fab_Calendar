<!DOCTYPE html>
<html lang="fr&&">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('fonts/css/all.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/connect.css')}}">
    <title>Login - Fab Calendar</title>
</head>

<body>
    <div class="inner-page">
        <section class="part-2 my-5 forms-panel d-flex flex-column justify-content-center align-items-center">
            @if(isset($existAdmin) && !$existAdmin)
            <form id="form" class="mt-5 admin" enctype="multipart/form-data">
                @csrf
                <header>
                    <img src="/img/logo2.png" alt="">
                    <h2>Inscription Administrateur</h2>
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
                <div class="mt-5 d-flex flex-column align-items-center">
                    <button type="submit" data-target="{{ route('admin_treat') }}" class="logup-button">S'inscrire</button>
                </div>
            </form>
            @elseif(isset($modify) && $modify==true)
            <form id="form" class="mt-5" enctype="multipart/form-data">
                @csrf
                <header>
                    <h2>Modification des informations</h2>
                </header>
                <div class="avatar-select d-flex justify-content-center align-items-center flex-column m-auto">
                <img src="{{ secure_asset('/storage/'.auth()->user()->avatars) }}" alt="">
                    <div class="form text-center">
                        <label for="avatar" class="fw-bold mx-auto"><i class="fas fa-camera fs-5"></i></label>
                        <input type="file" name="avatar" id="avatar" hidden>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" value="{{ auth()->user()->nom }}" autocomplete="off">
                    @if($errors->has('nom'))
                        <p class="error-msg">{{ $errors->first('nom') }}</p>
                    @endif

                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="{{ auth()->user()->prenom }}" autocomplete="off">
                    @if($errors->has('prenom'))
                        <p class="error-msg">{{ $errors->first('prenom') }}</p>
                    @endif

                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" autocomplete="off">
                    @if($errors->has('email'))
                        <p class="error-msg">{{ $errors->first('email') }}</p>
                    @endif

                </div>

                @if( auth()->user()->role=='apprenant' )
                    <div class="form-group">
                        <label for="formasuiv" id="formasuiv_label">Formation Suivie :</label>
                        <select type="text" id="formasuiv" name="formasuiv" autocomplete="off" >
                            <option value="{{ auth()->user()->formasuiv_id }}">{{ auth()->user()->formasuiv->formation }}</option>
                            @foreach($formations as $formation)
                            <option value="{{$formation->id}}">{{$formation->formation}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('formasuiv'))
                            <p class="error-msg">{{ $errors->first('formasuiv') }}</p>
                        @endif

                    </div>
                @endif

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password" autocomplete="off"> <i class="fas fa-eye"></i>
                    @if($errors->has('password'))
                        <p class="error-msg">{{ $errors->first('password') }}</p>
                    @endif

                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation de mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="off"> <i class="fas fa-eye"></i>
                    @if($errors->has('password_confirmation'))
                        <p class="error-msg">{{ $errors->first('password_confirmation') }}</p>
                    @endif

                </div>
                <div class="mt-5 d-flex flex-column align-items-center">
                    <button type="submit" formaction="{{ route('modify_treat') }}" formmethod='post' class="btn fs-2 fw-bolder btn-primary">Valider</button>
                </div>
            </form>
            @else
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
                    <label for="formasuiv" id="formasuiv_label">Formation Suivie :</label>
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
                    <p>ou <br> vous désirez vous inscrire en tant qu'apprenant ?</p>
                    <button type="submit" data-target="{{ route('logup_treat') }}" class="logup-button">S'inscrire</button>
                </div>
            </form>
            @endif
        </section>


    </div>

    <script src="{{ secure_asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ secure_asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ secure_asset('js/login.js')}}"></script>
</body>

</html>