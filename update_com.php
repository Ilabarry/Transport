<?php
require "hfc/config.php";
session_start(); 
if(!isset($_SESSION["email"]))  
 {  
   header("location:log/connexion.php");   
 }  

if(isset($_POST['update']))
{
// Get the contactid
$upid=intval($_GET['id']);
// Posted Values 
$conducteur=$_POST['conf-conduc'];
$commentaire=$_POST['commentaire'];


$sql=  $requete->prepare('UPDATE commentaire SET conf_conducteur=:conf,commentaires=:com WHERE id=:uid');

$sql->bindParam(':conf',$conducteur,PDO::PARAM_STR);
$sql->bindParam(':com',$commentaire,PDO::PARAM_STR);
$sql->bindParam(':uid',$upid,PDO::PARAM_STR);

$sql->execute();

echo "<script>alert('Commentaire modifier avec success');</script>";

echo "<script>window.location.href='notation.php'</script>"; 
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
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<body>
    <?php require_once "hfc/header.php";?>

        <div class="container"><br><br>
            <div>
                <h2 class="title-general_h2 text-center">formulaire de commentaires</h2>
                <b>NB: </b><p class="text-danger">Vous êtes conseillés de commenter avec toutes respet car toute personne qui dépasse ou insulte il sera automatiquement suprimée <span>(On dit que le respet et réciproque).</span> mercie de veiller sur ça !!!</p>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
                <div class="col-sm-8 col-md-6 col-lg-6"><br>

                    <?php 
                        // Get the contactid
                        $upid=intval($_GET['id']);
                        $sql = $requete->prepare('SELECT conf_conducteur,commentaires from commentaire where id=:uid');


                        $sql->bindParam(':uid',$upid,PDO::PARAM_STR);

                        $sql->execute();

                        $results=$sql->fetchAll(PDO::FETCH_OBJ);

                        $cnt=1;
                        if($sql->rowCount() > 0)
                        {

                            foreach($results as $result)
                        {               
                    ?>

                

                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])  ?>" method='POST'>

                        
                        <div class="form-group">
                            <label for="formGroupExampleInput">Confirmer le Nom du conducteur</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="conf-conduc" value="<?php echo htmlentities($result->conf_conducteur);?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Champ de commentaire</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="commentaire"><?php echo htmlentities($result->commentaires);?></textarea>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Pouvez parler sur le conducteur, les clients , le moins de transports et bien d'autres dificultés ou bonnheur que vous avez rencontrer pendant le voyage .
                            </small>
                        </div>

                    <?php }} ?>

                        <div class="form-group row text-center h4">
                            <input type="submit" name="update" id="" value="Ajouter la modification">
                        </div>
                    </form>

                </div>
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
            </div>

        </div>

        
        

        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>
</body