<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('css/layout.css')}}">
    <title>@yield('title_page','Fab Calendar')</title>
</head>

<body>
    <div class="inner-page">
        <header class="">
            <div class="inner-header container-fluid d-flex justify-content-between align-items-center m-auto">
                <span class="logo"> <img src="{{asset('img/logo1.png')}}" alt=""></span>
                <nav>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="@yield('notif_link')"><i class="fas fa-bell"></a></i></li>
                        <li class="list-inline-item"><a href="@yield('profile_link')"><i class="fas fa-user"></a></i></li>
                    </ul>
                </nav>
                <div class="days-panel">
                    <ul class="px-2 py-1 fw-bold d-flex justify-content-center align-items-center flex-wrap m-auto">
                        <li class="p-1" data-day="lun"><span> Lundi</span></li>
                        <li class="p-1" data-day="mar"><span>Mardi</span></li>
                        <li class="p-1" data-day="mer"><span>Mercredi</span></li>
                        <li class="p-1" data-day="jeu"><span>Jeudi</span></li>
                        <li class="p-1" data-day="ven"><span>Vendredi</span></li>
                        <li class="p-1" data-day="sam"><span>Samedi</span></li>
                        <li class="p-1" data-day="dim"><span>Dimanche</span></li>
                    </ul>
                </div>
        </header>
        <section class="main-section container-fluid">
        @yield('content_page')
    </section>
    </div>


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
    <script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
    <script>
        // $.text=`<style>header >div nav ul li:first-of-type a::before{
        //     content:'3';
        // }</style>`;
        // $('head').append($.text)
    </script>
</body>

</html>