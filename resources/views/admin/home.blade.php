@extends('general.layout')

@section('contenu')

<h1>Administration</h1>

<div class="the_block">
    <div class="gestion">
        <p> <strong>Gestion des jours d'accès <hr></strong> </p>
    </div>
    <div class="jours_concerné">

        <form action="" class="gestion_reservation">

        <div class="Day">
            <label for="day"> Jours Concerné</label>
            <input type="date" id='day' name='day'>
        </div>
        
        <div class="nbr">
            <input type="number" name="nbr_d'app" placeholder="Nombre d'apprenants autorisés :">
        </div>

        <div class="Horaires">
            <p>Horaires  :</p>
        </div>
        <div class="debut">
            <label for="debut"> Debut :</label>
            <input type="time" name="time_start" id="debut">
        </div>

        <div class="fin">
            <label for="fin"> Fin :</label>
            <input type="time" name="time_end" id="fin">
        </div>

        <div class="valid">
            <input type="submit"  name="valider" value="valider">  
        </div>


        </form>

    </div>

</div>


@endsection
   