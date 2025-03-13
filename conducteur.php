

<?php
        require_once 'hfc/config.php';
        session_start();
        $users_id=$_SESSION['id_users'];

        if (isset($_REQUEST["del"])) {
            $del_id=intval($_GET["del"]);
            $sql=$requete->prepare("DELETE FROM conducteur where id=:id");
            $sql->bindParam(':id',$del_id,PDO::PARAM_STR);
            $sql->execute();
            echo "<script>alert('information suprimer avec succé ')</script>";
            echo "<script>window.location.href='conducteur.php'</script>";
        }

        $result = $requete->prepare('SELECT  conducteur.*,users.prenom,users.nom FROM conducteur INNER JOIN users ON conducteur.id_users = users.id;');
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
       border-radius:10px;
       height:341px;
    }
    .jumbotro .display-4 {
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

#blogs{
    padding: 50px 200px
}

.cardre{
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.05);
    padding:5px 10px;
    cursor:pointer;
    border-radius:20px;
}
.cardre:hover{
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
    padding:5px 10px;
    cursor:pointer;
    border-radius:20px;
}
p a #a_updet-icon {
        font-size:20px;
    }
    p a{
        text-decoration:none;
    }

.update{
        position:absolute;
        top:78%;
        left: 50px;
        /* width:100%; */
        border:none;
        z-index:1;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .delet{
        position:absolute;
        top: 78%;
        left:180px;
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
    a small{
        position:absolute;
        top: 75%;
        left:100px;
        /* width:100%; */
        border:none;
        z-index:1;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.05);
        border-radius:8px;
        border-radius:100%
    }
    a small:hover{
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
        border-radius:8px;
        border-radius:100%
    }
   
    
    
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
    <?php require_once "hfc/header.php";?>
        <img class="img_header" src="images/img_conduct.jpg" alt="" height="420px">
        <div class="jumbotro acceuil"><br><br><br><br><br>
            <h1 class="display-4 text-center">Les conducteurs</h1>
            <p class="lead text-center text-white" id="confiance">Confiance de voyager partous au sénégal dans la sécurité avec séneTransport </p>
            <hr class="my-2">
        </div><br>
        <div class="container">
            <h3 class="text-center">Cette partie est crée pour permetre aux conducteurs d'ajouter leurs informations pour faciliter les choix des clients </h3>
        </div>

        <div class="text-center">
            <a href="from_conduct.php" class="px-5 py-2 text-white text-center button_comantaire text-decoration-none">Ajouter mes informations</a>
        </div><br>
        

 <div id="blogs">
    
        
          

    <?php if (count($conducteur) > 0): ?>

        <?php echo '<div class="container blogs">' ;?>
            <?php echo '<div class="row row-cols-1 row-cols-md-3 g-4">' ;?>
                <?php foreach($conducteur as $files): ?>
                <?php echo '<div class="col-mb-6 col-lg-4">' ;?>
                    <?php echo '<div class="cardre h-100">' ;?>
                        <img src="<?php echo $files['profil'] ;?>" class="card-img-top img-fluid" alt="profil" style="height:120px";>
                        <?php echo '<div class="card-body">' ;?>
                            <h5 class="card-title"><?php echo $files['prenom'] . ' ' . $files['nom'];?></h5>
                            <p class="card-text"><b>Transport : </b><?php echo $files['nom_transport'] ; ?></p>
                            <p class="card-text"><b>Permis :  </b><?php echo $files['type_permi'] ; ?></p>
                            <p class="card-text px-5"> 
                                        <!-- <a href="from_commentaire.php" id="a_commentaire"><small class="text-mute commentaire"><i class="fa fa-comments text-warning" aria-hidden="true"></i></small> </a> -->
                                            
                                        <?php if ($files['id_users'] == $users_id): ?>

                                            <a href="update_conduc.php?id=<?php echo $files['id'] ; ?>" class="update"
                                            onClick="return confirm('Voulez-vous modifier le commentaire')"><i class="fa fa-pencil" id="a_updet-icon" aria-hidden="true"></i></a>

                                            <a href="conducteur.php?del=<?php echo $files['id'];?>" class="text-danger delet"
                                            onClick="return confirm('Vos informations sera suprimé ')"><i class="fa fa-trash-o" aria-hidden="true" id="a_updet-icon"></i></a>

                                        <?php endif ;?>

                                         &nbsp;&nbsp;&nbsp;&nbsp;<a href="affiche_conduc.php?id=<?php echo $files['id']; ?>"><small class="text-mute px-3"><i class="fa fa-eye text-warning" aria-hidden="true" style="font-size:20px;"></i></small></a>  
                                    
                                    </p>
                            <!-- <p class="card-text"><b>Mes informations professionnelles : <br></b><?php// echo $files['information'] ; ?></p> -->
                            <p class="card-text"><small class="text-muted"><?php echo $files['created_at'] ; ?></small></p>
                        <?php echo '</div>' ;?>
                    <?php echo '</div>' ;?>
                <?php echo '</div>' ;?>
                <?php endforeach ;?>
            <?php echo '</div>' ;?>
        <?php echo '</div>' ;?>
    <?php endif; ?>

       
        
</div> 
        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body