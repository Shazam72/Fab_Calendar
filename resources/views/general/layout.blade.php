<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('fonts/css/all.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/layout.css')}}">
    @yield('style_page')
    <title>@yield('title_page','Fab Calendar')</title>
</head>

<body>
    <div class="inner-page">
        <header class="">
            <div class="inner-header container-fluid d-flex justify-content-between align-items-center m-auto">
                <span class="logo"> <img src="{{secure_asset('img/logo1.png')}}" alt="Logo Fab Calendar" data-target=" {{ route(auth()->user()->role.'_home') }} "></span>

                <div class="avatar d-flex justify-content-between align-items-center">
                    <img src="{{ secure_asset('/storage/'.auth()->user()->avatars) }}" alt="Avatar Utilisateur" data-target=" {{ route(auth()->user()->role.'_profile') }} ">
                </div>

                <nav>
                    <ul class="list-inline">
                        <li class="list-inline-item py-3 px-4 @yield('notif_active','')"><a href="@yield('notif_link',route('home'))" data-count="2"><i class="fas fa-bell"></i></a></li>
                        <li class="list-inline-item @yield('profile_active','') py-3 px-4"><a href="@yield('profile_link',route( auth()->user()->role.'_profile'))"><i class="fas fa-user"></i></a></li>
                    </ul>
                </nav>
                <a href="{{ route(auth()->user()->role.'_disconnect') }}" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <div class="days-panel">
                    <ul class="px-5 py-1 fw-bold d-flex justify-content-center align-items-center flex-wrap m-auto">
                        <li class="p-1 px-3" data-day="lun"><span data-bs-toggle="modal" data-bs-target="#lun">Lundi</span></li>
                        <li class="p-1 px-3" data-day="mar"><span data-bs-toggle="modal" data-bs-target="#mar">Mardi</span></li>
                        <li class="p-1 px-3" data-day="mer"><span data-bs-toggle="modal" data-bs-target="#mer">Mercredi</span></li>
                        <li class="p-1 px-3" data-day="jeu"><span data-bs-toggle="modal" data-bs-target="#jeu">Jeudi</span></li>
                        <li class="p-1 px-3" data-day="ven"><span data-bs-toggle="modal" data-bs-target="#ven">Vendredi</span></li>
                        <li class="p-1 px-3" data-day="sam"><span data-bs-toggle="modal" data-bs-target="#sam">Samedi</span></li>
                    </ul>
                </div>
            </div>
        </header>
        <section class="reservation_panel">

            <div class="modal fade show position-fixed" id="lun">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Lundi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between fw-bolder fs-3 align-items-center info">
                                <span class="date">17/09/2020</span>
                                <span class="time">De 12h à 15h</span>
                            </div>
                            <div class="places mt-5 fw-bold">
                                Il y'a actuellement <span class="fs-3 text-danger">15</span> places de disponibles pour ce jour
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            @if(auth()->user()->role=='apprenant')
                            <button type="button" class="btn btn-primary">Réserver</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show position-fixed" id="mar">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Mardi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between fw-bolder fs-3 align-items-center info">
                                <span class="date">17/09/220</span>
                                <span class="time">De 12h à 15h</span>
                            </div>
                            <div class="places mt-5 fw-bold">
                                Il y'a actuellement <span class="fs-3 text-danger">15</span> places de disponibles pour ce jour
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            @if(auth()->user()->role=='apprenant')
                            <button type="button" class="btn btn-primary">Réserver</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show position-fixed" id="mer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Mercredi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between fw-bolder fs-3 align-items-center info">
                                <span class="date">17/09/220</span>
                                <span class="time">De 12h à 15h</span>
                            </div>
                            <div class="places mt-5 fw-bold">
                                Il y'a actuellement <span class="fs-3 text-danger">15</span> places de disponibles pour ce jour
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            @if(auth()->user()->role=='apprenant')
                            <button type="button" class="btn btn-primary">Réserver</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show position-fixed" id="jeu">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Jeudi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between fw-bolder fs-3 align-items-center info">
                                <span class="date">17/09/220</span>
                                <span class="time">De 12h à 15h</span>
                            </div>
                            <div class="places mt-5 fw-bold">
                                Il y'a actuellement <span class="fs-3 text-danger">15</span> places de disponibles pour ce jour
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            @if(auth()->user()->role=='apprenant')
                            <button type="button" class="btn btn-primary">Réserver</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show position-fixed" id="ven">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Vendredi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between fw-bolder fs-3 align-items-center info">
                                <span class="date">17/09/220</span>
                                <span class="time">De 12h à 15h</span>
                            </div>
                            <div class="places mt-5 fw-bold">
                                Il y'a actuellement <span class="fs-3 text-danger">15</span> places de disponibles pour ce jour
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            @if(auth()->user()->role=='apprenant')
                            <button type="button" class="btn btn-primary">Réserver</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show position-fixed" id="sam">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Samedi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between fw-bolder fs-3 align-items-center info">
                                <span class="date">17/09/220</span>
                                <span class="time">De 12h à 15h</span>
                            </div>
                            <div class="places mt-5 fw-bold">
                                Il y'a actuellement <span class="fs-3 text-danger">15</span> places de disponibles pour ce jour
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            @if(auth()->user()->role=='apprenant')
                            <button type="button" class="btn btn-primary">Réserver</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="main-section container-fluid">
            @yield('content_page')
        </section>
        <footer class="mt-5 d-flex justify-content-center align-items-center">
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
    </div>
    <script src="{{ secure_asset('js/popper.min.js')}}"></script>
    <script src="{{ secure_asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ secure_asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ secure_asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ secure_asset('js/layout.js')}}"></script>
    @yield('script')
</body>

</html>