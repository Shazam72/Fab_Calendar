<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/email.css')}}">
    <title>Confirmation de mail</title>
</head>

<body class="d-flex m-auto justify-content-center align-items-center flex-column text-center">
<img src=" {{ secure_asset('img/logo2.png') }} " alt="" class="mb-5">
    <div>
        <h2>{{ucfirst($name) }}</h2>
        <p class="fw-bold">
            Afin de vérifier votre addresse électronique et ainsi confirmer <br>
            votre incription sur la plate-forme Fab Calendar, <br>
            Veuillez cliquez ci-dessous.
        </p>
        <a href=" {{ route('confirm_link',['token'=>$token]) }}"  class="btn btn-primary w-50 mx-5">Confirmer</a>
    </div>
</body>

</html>