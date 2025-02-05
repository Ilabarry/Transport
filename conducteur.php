
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .acceuil{
        background:rgba(0, 255,0, 0.19);
       border-radius:10px;
       height:420px;
    }
    .jumbotro .display-4 {
        border-bottom: 3px solid red;
        border-radius: 0 50% 0 50%;
        color:yellow;
        font-family: "Rubik Glitch", serif;
        font-weight: 400;
        font-style: normal;
       font-weight:900 ;
    }
    .jumbotro h3{
        color:#fff;
        font-size:30px;
    }
    .img_header{
        position:absolute;
        top:0;
        left:0;
        width:100%;
        border:none;
        z-index:-1;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .button_comantaire{
        background: #2ecc71;
        font-size:24px;
        border-radius:15px;
        margin-top:90px;
        transition:0.5s
    }
    .button_comantaire:hover{
        font-size:25px;
        color:yellow;
    }
    p{
        opacity:0.5;
    }
    .text-commantaire{
        background:#eee;
        padding:50px 0;

    }
    .title-general_h2{
        background:#2ecc71 ;
        border-bottom: 3px solid red;
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:yellow;
        font-weight: 400;
        font-style: normal;

    }
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<body>
    <?php require_once "hfc/header.php";?>
        <img class="img_header" src="images/img_conduct.jpg" alt="" width="100%" height="420px">
        <div class="jumbotro acceuil"><br><br><br><br><br><br><br><br>
            <h1 class="display-4 text-center">Les conducteurs</h1><br><br>
            <!-- <p class="lead text-center text-white">Confiance de voyager partous au sénégal dans la sécurité avec séneTransport </p> -->
            <!-- <hr class="my-2"> -->
        <!-- </div> -->
         <div class="container">
            <h3 class="text-center">Cette partie est crée pour permetre aux conducteurs d'ajouter leurs informations pour faciliter les choix des clients </h3>
         </div>
        </div>

        

        <div class=" h4 text-commantaire">
            <p class="container p">
                Une gestion efficace des conducteurs et des transporteurs est essentielle pour garantir que la plateforme fonctionne correctement et offre un service de qualité.
                Cette partie est pour permettre aux conducteurs de travailler de manière autonome, tout en garantissant la sécurité, la conformité et la satisfaction des utilisateurs.
            </p>
            <div class="mt-5 text-center">
                <a href="from_conduct.php" class="px-5 py-2 text-white text-center button_comantaire text-decoration-none">Ajouter mes informations</a>
            </div>
        </div>
        

        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>
</body