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
        padding:5px 20px;
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
        <img class="img_header" src="images/img_notation.jpg" alt="" width="100%" height="420px">
        <div class="jumbotro acceuil"><br><br><br><br><br><br><br><br>
            <h1 class="display-4 text-center">COMMENTAIRES</h1><br><br>
            <!-- <p class="lead text-center text-white">Confiance de voyager partous au sénégal dans la sécurité avec séneTransport </p> -->
            <!-- <hr class="my-2"> -->
        <!-- </div> -->
         <div class="container">
            <h3 class="text-center">Cette partie est crée pour ajouter des commentaires et repondre les commantaires des autres. </h3>
         </div>
        </div>

        

        <div class=" h4 text-commantaire">
            <p class="container p">
                Le système de<b> notation et d’avis</b> est essentiel pour maintenir la qualité et la confiance dans ce site de voyage. Il permet non seulement de garantir la transparence et la responsabilisation des conducteurs et des véhicules, mais aussi d’améliorer l’expérience utilisateur en prenant en compte les retours. Avec un système de modération efficace, des commentaires détaillés et une évaluation transparente, les utilisateurs peuvent se sentir en confiance lorsqu'ils choisissent un service, et les conducteurs peuvent également recevoir des retours constructifs pour améliorer leurs prestations. Le système doit être pensé pour être juste, respectueux et bénéfique pour tous les acteurs de la plateforme.
            </p>
            <div class="mt-5 text-center">
                <a href="from_commentaire.php" class="px-5 py-2 text-white text-center button_comantaire text-decoration-none">Ajouter un commantaire</a>
            </div>
        </div>
        

        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>
</body