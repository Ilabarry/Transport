
<?php
        require_once 'hfc/config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $result = $requete->prepare('SELECT  conducteur.*,users.prenom,users.nom FROM conducteur INNER JOIN users ON conducteur.id_users = users.id where conducteur.id = :id ');
        $result->execute(['id' => $id]);
        $conducteur = $result->fetch(PDO::FETCH_ASSOC);


     if ($conducteur){ ?>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    
    #confiance{
        opacity:0.9;
        font-size:35px;
    }

#blogs{
    padding: 50px 200px
}

.cardre{
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
    padding:5px 10px;
    cursor:pointer;
    border-radius:20px;
}
    
    
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
    <?php require_once "hfc/header.php";?>
        
        

 <div id="blogs">
    
        
 

    
        

        <?php echo '<div class="container blogs">' ;?>
            <?php echo '<div class="row row-cols-1 row-cols-md-1 g-4">' ;?>

                    <div class="cardre mb-3" style="max-width: 100%;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="<?php echo $conducteur['profil']; ?>" class="card-img-top img-fluid" alt="profil" style="height:200px";>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $conducteur['prenom'] . ' ' . $conducteur['nom'];?></h5>
                                <p class="card-text"><b>Mon Permis :  </b><?php echo $conducteur['type_permi']; ?></p>
                                <p class="card-text"><b>Transport : </b><?php echo $conducteur['nom_transport']; ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $conducteur['created_at']; ?></small></p>
                            </div>
                            </div>
                        </div>
                    </div>
            <?php echo '</div>' ;?>
            <p class="card-text"><b>Ma presentation complet :  <br></b><?php echo $conducteur['information']; ?></p>

        <?php echo '</div>' ;?>

        

       
        
</div> 
        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
    }else{
            echo "Ce conducteur n\'est pas enregistré";
    }
}else{
    echo "Id non reconnu";
}
?>