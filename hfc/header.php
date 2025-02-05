<!doctype html>
<html lang="en">
  <head>
    <title>SenVoyage</title>
    <link rel="icon" type="image" href="senvoyagee.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Diplomata+SC&family=Rubik+Glitch&family=Rubik+Puddles&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        header{
            background-color:#2ecc71  ;
            box-shadow:red 1px 1px 3px  ; 
            position: fixed;
            width: 100%;
            z-index: 3;
        }
        .mt-1 i b{
            color:yellow;
            font-weight:900 ;
            font-size:30px;
        }
        ul li a{
            font-style:bold;
            transition: 0.5s;
        }
        ul li a:hover{
            border-bottom: 2px solid yellow;
            border-top: 2px solid yellow;
            border-radius:10px;
        }
    </style>
  </head>
  <body>
    <header>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 mt-1 text-center">
                <a class="nav-link text-white h6 px-3" href="index.php">
                    <i><b>SenVoyage</b></i>
                    <img src="logoo.png" alt="logo" height="70px" width="70px">
                </a>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-8 text-center mt-3">

            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white h6 px-3" href="reservation.php">Reservation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white h6 px-3" href="notation.php">Notation & Avis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white h6 px-3" href="client.php">Client & Assistance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white h6 px-3" href="conducteur.php">Conducteurs(Transporteurs)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white h6 px-3" href="log/connexion.php">Connexion<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-1 text-center">
                <p>profil</p>
            </div>
        </div>
    </header>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>