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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Diplomata+SC&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rubik+Glitch&family=Rubik+Puddles&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        header{
            position:absolute;
            top: 0;
            left:0;
            width:100%;
            border:none;
            display:flex;
            align-items:center;
            justify-content:center;
            background-color:#2ecc71  ;
            box-shadow:red 1px 1px 3px  ; 
            position: fixed;
            width: 100%;
            z-index: 3;
        }
        .mt-1 i b{
            color:yellow;
            font-weight:900 ;
            font-size:25px;
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
        .image_head{
            height:50px;
             width:100px;
        }
    </style>
  </head>
  <body>
    <div style="height: 80px;">
    <header>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 mt-1">
                <a class="nav-link text-white h4 px-1 row" href="index.php">
                    <i><b>SenVoyage</b>
                    <img src="logoo.png" alt="logo"  class="image_head"></i>
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
                            <a class="nav-link text-white h6 px-3" href="notation.php">Commentaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white h6 px-3" href="client.php">Tarifs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white h6 px-3" href="conducteur.php">Conducteurs(Transporteurs)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white h6 px-3" href="log/connexion.php">Connexion</a>
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
    </div>
    