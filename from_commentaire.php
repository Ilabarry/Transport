<?php
require "hfc/config.php";
session_start(); 
if(!isset($_SESSION["email"]))  
 {  
   header("location:log/connexion.php");   
 }  



if (isset($_POST['submit'])) {

    


    
    $conducteur = $_POST['conducteur'];
    $Confconducteur = $_POST['conf-conduc'];
    $commentaire = $_POST['commentaire'];
    $email = $_SESSION['email'];

    if(empty($conducteur) || empty($Confconducteur) || empty($commentaire)){
        echo "<script> alert(' vous avez envoyé un ou des champs sans données')</script>";
    }else {
        
   

        $query = $requete->prepare('SELECT id FROM users WHERE email = :email');
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);


        if ($user) {
                $userId = $user['id'];
        
                $result = $requete->prepare('INSERT INTO commentaire(nom_conducteur, conf_conducteur, commentaires, id_users) VALUES(:cond,:conf, :com, :id_users)');
                $result->bindParam(':cond', $conducteur, PDO::PARAM_STR);
                $result->bindParam(':conf', $Confconducteur, PDO::PARAM_STR);
                $result->bindParam(':com', $commentaire, PDO::PARAM_STR);
                $result->bindParam(':id_users', $userId, PDO::PARAM_INT);
                $result->execute();
                echo "<script>alert('Commentaire ajouter avec succé ')</script>";
                echo "<script>window.location.href='notation.php'</script>";
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
        background:rgba(0, 0,0, 0.29);
       height:200px;
    }
    .jumbotro .display-4 {
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:#fff;
        font-family: "Roboto", serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        font-variation-settings:"wdth" 100;

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
        height:300px;
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
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:#fff;
        font-weight: 400;
        font-style: normal;

    }
    #confiance{
        opacity:0.9;
        font-size:35px;
    }
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<body>
    <?php require_once "hfc/header.php";?>
        <img class="img_header" src="images/img_notation.jpg" alt="" width="100%" height="300px">
        <div class="jumbotro acceuil"><br><br><br>
            <h1 class="display-4 text-center">AJOUTER UN COMMENTAIRES</h1>
        </div>

        <div class="container"><br><br>
            <div>
                <h2 class="title-general_h2 text-center">formulaire de commentaires</h2>
                <b>NB: </b><p class="text-danger">Vous êtes conseillés de commenter avec toutes respet car toute personne qui dépasse ou insulte il sera automatiquement suprimée <span>(On dit que le respet et réciproque).</span> mercie de veiller sur ça !!!</p>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
                <div class="col-sm-8 col-md-6 col-lg-6"><br>

                

                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])  ?>" method='POST'>

                        <div class="col-md-12 my-4">
                            <label for="exampleFormControlSelect1">Nom du conducteur</label>
                            <?php
                            require "hfc/config.php";
                            $event= $requete->prepare( "SELECT * FROM users WHERE role= 'conducteur'");
                            $event->execute();
                            ?>
                            <select class="form-control" name="conducteur">
                                <option value="">conducteur</option>

                                <?php while($rows = $event->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value="<?php echo $rows['id']; ?>">
                                <?php echo $rows['prenom']." ".$rows['nom']; ?></option>
                                <?php } ?>
                            </select>
                        </div> 

                        <div class="form-group">
                            <label for="formGroupExampleInput">Confirmer le Nom du conducteur</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="conf-conduc" >
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Champ de commentaire</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="commentaire"></textarea>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Pouvez parler sur le conducteur, les clients , le moins de transports et bien d'autres dificultés ou bonnheur que vous avez rencontrer pendant le voyage .
                            </small>
                        </div>
                            <div class="form-group row text-center h4">
                                <input type="submit" name="submit" id="" value="Envoyer mon commentaire">
                            </div>
                    </form>

                </div>
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
            </div>

        </div>

        
        

        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>
</body