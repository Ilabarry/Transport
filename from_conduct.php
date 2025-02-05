<?php
if(isset($_POST['conducteur']))
{

    if (isset($_FILES['image'])) {
        $image=$_FILES['image']['name'];
        $target= "uploads/" . basename($image);

        $imageType=strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $lesTypes=['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($imageType, $lesTypes)) {
            echo "<b class='text-danger b_form'> seul les images de types ( jpg, jpeg, png et gif) sont autorisées</b>";
        }
        
    }
    
    
    $permis=$_POST['typePermi'];
    $transport=$_POST['typeTransport'];
    $information=$_POST['information'];
    if (empty($image) || empty($permis) || empty($information)) {
            echo "<b class='text-danger b_form'> Mercie de bien remplir tous les champs de formulaire</b>";
        }
    else {
        try{
            require "../hfc/config.php";
            $sql = "INSERT INTO conducteur(image,type_permi,type_transport,information)
            VALUES(:img,:typeP,:typeT,:info)";
            $stmt = $requete->prepare($sql);
            $stmt->bindParam(':img',$image,PDO::PARAM_STR);
            $stmt->bindParam(':typeP',$permis,PDO::PARAM_STR);
            $stmt->bindParam(':typeT',$transport,PDO::PARAM_STR);
            $stmt->bindParam(':info',$information,PDO::PARAM_STR);
            
            $stmt->execute();
            echo "<script>alert('Inscription réussi avec success');</script>";
        }
        catch(PDOException $e)
        {
           echo "Erreur lors de la connexion : " .$e->getMessage();
        }
    }
    
}
?>



<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .acceuil{
        background:rgba(0, 255,0, 0.19);
       border-radius:10px;
       height:300px;
    }
    .jumbotro .display-4 {
        /* background:#2ecc71 ; */
        border-bottom: 3px solid red;
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:yellow;
        font-family: "Rubik Glitch", serif;
        font-weight: 400;
        font-style: normal;

        margin-top:20px;
       /* color:#808000; */
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
    
   
    input[type=submit]{
        background:#2ecc71;
        padding:10px 90px;
        border:none;
        border-radius:15px;
        color:white;
        transition:0.5s;
    }
    input[type=submit]:hover{
        font-size:25px;
        color:yellow;
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
    .b_form{
        position:absolute;
        top:470px;
        left:0;
        width:100%;
        border:none;
        z-index:1;
        display:flex;
        align-items:center;
        justify-content:center;
    }
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<body>
    <?php require_once "hfc/header.php";?>
        <img class="img_header" src="images/img_conduct.jpg" alt="" width="100%" height="300px">
        <div class="jumbotro acceuil"><br><br><br><br><br><br><br><br>
            <h1 class="display-4 text-center">formulaire d'informations</h1><br><br>
          
        </div>

        <div class="container"><br><br>
            <div>
                <h2 class="title-general_h2 text-center">Obligatoire de remplir ce formulaire pour obtenir de clients</h2>
                <b>NB: </b><p class="text-danger">Soyez prudant, faut pas dire ce que vous n'êtes pas oubien ce que vous ne povez pas faire merci !!! </p>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
                <div class="col-sm-8 col-md-6 col-lg-6"><br>

                

                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ajouter une image professionnelle</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Votre types de permis</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="typePermi">
                                <option value="Poid légère">Poid légère</option>
                                <option value="Poid moyen">Poid moyen</option>
                                <option value="Poid lourd">Poid lourd</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type de transport</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="typeTransport">
                                <option value="Bus">Un Bus</option>
                                <option value="Mini-bus">Un Mini-bus</option>
                                <option value="7-Places">Un 7-Places</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ajoutez vos informations</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="information"></textarea>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Merci de ne pas négliger cette partie,surtous donner vos compétence, montrez vos savoir faire et vos savoire être. car les utulisateurs(clients) on la possibilité de voire tous vos informations.
                            </small>
                        </div>
                            <div class="form-group row text-center h4">
                                <!-- <div class="col-sm-10"> -->
                                    <input type="submit" name="conducteur" id="" value="Envoyer mon commentaire">
                                <!-- </div> -->
                            </div>
                    </form>

                </div>
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
            </div>

        </div>

        
        

        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>
</body