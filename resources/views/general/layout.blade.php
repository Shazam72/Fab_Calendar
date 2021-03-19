<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('css/layout.css')}}">
    <title>Document</title>
</head>


<body>


    <header style="height:120px">

        <div class="container-fluid  h-100" style="background:#b7384e; height">
                 <img src="{{asset('img/logo1.png')}}" alt="">
             <div class=icons>
            
                 <a href="#" data-toggle="modal" data-target=#Modal><i class="fas fa-bell bell"></i></a>

                    <div class="modal fade" id="Modal">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                </div>

                                <div class="modal-body">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>
                                </div>
                            
                            </div>

             

                    </div>
                 </div>
                 
                <a href="#"> <i class="fas fa-user users"></i></a>
             </div>

         </div>
          
    </header>
 
    <div class="conten">
        <div class="block">
            <ul>
                <ol>lundi</ol>
                <ol>Mardi</ol>
                <ol>Mercredi</ol>
                <ol>Jeudi</ol>
                <ol>Vendredi</ol>
                <ol>Samedi</ol>
                
                
            </ul>
        </div>
        @yield('contenu')
        

    </div>
    <div class="container-fluid event">
            <p> <a href="#"> ©Copyright Simplon 2021 - politiques et Confidentialités.</a>    <a href="#"> Tous droits Réservés</a></p>
        </div>
    <footer>

        

    </footer>

</body>



</html>