<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('fonts/css/all.css')}}">
    <style>
        body{
            height: 100vh;
            width: 10;
        }
    </style>
    <title>Erreur avec la base de donnée</title>
</head>

<body class="d-flex justify-content-center align-items-center flex-column">
    <div class="errors">
       <h1 class=""> UNE ERREUR EST SURVENUE. </h1>
        <h2>Veuillez essayer une des solutions ci-dessous</h2>
        <ul>
            <li><h4>Renvoyez le formulaire</h4></li>
            <li><h4>Vérifier votre connexion internet</h4></li>
        </ul>
    </div>
</body>

</html>