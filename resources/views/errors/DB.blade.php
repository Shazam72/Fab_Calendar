<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/css/all.css')}}">
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
       <h1 class=""> UNE ERREUR EST SURVENUE AVEC LA BASE DONNEE. </h1>
        <h2>Veuillez essayer une des solutions ci-dessous</h2>
        <ul>
            <li><h4>Relancer votre serveur ainsi que le système de gestion de base de données</h4></li>
            <li><h4>Revenir a la dernier version du fichier</h4></li>
            <li><h4>Redémmarez votre ordinateur</h4></li>
        </ul>
    </div>
</body>

</html>