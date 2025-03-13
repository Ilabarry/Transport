
<?php
        require_once 'hfc/config.php';

        session_start();
        $users_id=$_SESSION['id_users'];

        if (isset($_REQUEST["del"])) {
            $del_id=intval($_GET["del"]);
            $sql=$requete->prepare("DELETE FROM commentaire where id=:id");
            $sql->bindParam(':id',$del_id,PDO::PARAM_STR);
            $sql->execute();
            echo "<script>alert('Commentaire suprimer avec succé ')</script>";
            echo "<script>window.location.href='notation.php'</script>";
        }
    
        $result = $requete->prepare('SELECT  commentaire.*,users.prenom,users.nom FROM commentaire INNER JOIN users ON commentaire.id_users = users.id;');
        $result->execute();
        $conducteur = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .acceuil{
        background:rgba(0, 0,0, 0.29);
       /* border-radius:10px; */
       height:340px;
    }
    .jumbotro .display-4 {
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:#fff;
        font-family: "Roboto", serif;
        font-optical-sizing: auto;
        font-weight: 900;
        font-style: normal;
        font-variation-settings:"wdth" 100;
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
    #confiance{
        opacity:0.9;
        font-size:35px;
    }
    .text-commantaire{
        background:#eee;
        padding:50px 0;

    }

    p .fa-user-circle{
        font-size:54px;
    }
    p #a_commentaire .fa-comments{
        font-size:24px;
        text-decoration:none;
    }
    p #a_commentaire .fa-comments:hover{
        border-radius:none;
        font-size:24px;
    }
    p a #a_updet-icon {
        font-size:20px;
    }
    p a{
        text-decoration:none;
    }
    .update{
        position:absolute;
        top:80%;
        left: 60px;
        /* width:100%; */
        border:none;
        z-index:1;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .delet{
        position:absolute;
        top: 80%;
        left:170px;
        /* width:100%; */
        border:none;
        z-index:1;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .update,.delet{
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.05);
        border-radius:8px;
        border-radius:100%
    }
    .update:hover,.delet:hover{
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
        border-radius:8px;
        border-radius:100%
    }

    .cardre-card{
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.05);
        padding:5px 10px;
        cursor:pointer;
        border-radius:8px;
    }
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<body>
    <?php require_once "hfc/header.php";?>
        <img class="img_header" src="images/img_notation.jpg" alt="" width="100%" height="420px">
        <div class="jumbotro acceuil"><br><br><br><br>
            <h1 class="display-4 text-center">COMMENTAIRES</h1>
            <p class="lead text-center text-white" id="confiance">Confiance de voyager partous au sénégal dans la sécurité avec séneTransport </p>
            <hr class="my-2">
        </div><br>
        <div class="container">
            <h3 class="text-center">Cette partie est crée pour ajouter des commentaires et repondre les commantaires des autres. </h3>
        </div>

        

        <!-- <div class=" h4 text-commantaire containef">
            <p class="container p">
                Le système de<b> notation et d’avis</b> est essentiel pour maintenir la qualité et la confiance dans ce site de voyage. Il permet non seulement de garantir la transparence et la responsabilisation des conducteurs et des véhicules, mais aussi d’améliorer l’expérience utilisateur en prenant en compte les retours. Avec un système de modération efficace, des commentaires détaillés et une évaluation transparente, les utilisateurs peuvent se sentir en confiance lorsqu'ils choisissent un service, et les conducteurs peuvent également recevoir des retours constructifs pour améliorer leurs prestations. Le système doit être pensé pour être juste, respectueux et bénéfique pour tous les acteurs de la plateforme.
            </p> -->
            <div class="text-center">
                <a href="from_commentaire.php" class="px-5 py-2 text-white text-center button_comantaire text-decoration-none">Ajouter un commantaire</a>
            </div><br>

            <?php if (count($conducteur) > 0): ?>

                <?php echo '<div class="container">' ;?>

                    <?php echo '<div class="row row-cols-1 row-cols-md-4 g-4">' ;?>
                        <?php foreach($conducteur as $commentaire): ?>
                        <?php echo '<div class="col-mb-4 col-lg-3 mt-3">' ;?>
                            <?php echo '<div class="cardre-card h-100 pb-5">' ;?>
                                <?php echo '<div class="card-body">' ;?>
                                    <p class="text-center"><i class="fa fa-user-circle" aria-hidden="true"></i></p>
                                    <h5 class="card-title text-center"><?php echo $commentaire['prenom'] . ' ' . $commentaire['nom'];?></h5>
                                    <!-- <p class="card-text"><b class="h6">à comenter, <br> </b><?php //echo $commentaire['nom_conducteur'] ; ?></p> -->
                                    
                                    <p class="card-text h6">à comenter, <br> <?php echo $commentaire['conf_conducteur'] ; ?></p>

                                    <div class="dropdown">
                                        <a class="btn btn-success dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        Voire le commentaire
                                        </a>

                                        <div class="dropdown-menu">
                                        <?php echo $commentaire['commentaires'] ; ?>
                                        </div>
                                    </div>

                                    <p class="card-text px-5"> 
                                        <!-- <a href="from_commentaire.php" id="a_commentaire"><small class="text-mute commentaire"><i class="fa fa-comments text-warning" aria-hidden="true"></i></small> </a> -->
                                            
                                        <?php if ($commentaire['id_users'] == $users_id): ?>

                                            <a href="update_com.php?id=<?php echo $commentaire['id'] ; ?>" class="update"
                                            onClick="return confirm('Voulez-vous modifier le commentaire')"><i class="fa fa-pencil" id="a_updet-icon" aria-hidden="true"></i></a>

                                            <a href="notation.php?del=<?php echo $commentaire['id'];?>" class="text-danger delet"
                                            onClick="return confirm('Votre commentaire sera suprimé ')"><i class="fa fa-trash-o" aria-hidden="true" id="a_updet-icon"></i></a>
                                            
                                        <?php endif ;?>

                                         <!-- &nbsp;&nbsp;&nbsp;&nbsp;  <small class="text-mute px-3"><i class="fa fa-eye text-warning" aria-hidden="true"></i></small> -->
                                    
                                    </p>
                                <?php echo '</div>' ;?>

                            <?php echo '</div>' ;?>
                        <?php echo '</div>' ;?>
                        
                        <?php endforeach ;?>
                    <?php echo '</div>' ;?>
                <?php echo '</div>' ;?>
            <?php endif; ?>

            

        </div>
        
<br><br>
    <?php require_once "hfc/footer.php";?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</body>

<script>

    $(document).ready(function () {
        
        

    });

</script>







