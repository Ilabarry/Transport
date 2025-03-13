<?php
require "hfc/config.php";
session_start(); 
if(!isset($_SESSION["email"]))  
 {  
   header("location:log/connexion.php");   
 }  

if(isset($_POST['update_conduct']))
{
// Get the contactid
$upid=intval($_GET['id']);
// Posted Values 
    $typePermi = $_POST['typePermi'];
    $typeTransport = $_POST['typeTransport'];
    $information = $_POST['information'];


$sql=  $requete->prepare('UPDATE conducteur SET type_permi=:permi, nom_transport=:transport, information=:information WHERE id=:uid');

$sql->bindParam(':permi',$typePermi,PDO::PARAM_STR);
$sql->bindParam(':transport',$typeTransport,PDO::PARAM_STR);
$sql->bindParam(':information',$information,PDO::PARAM_STR);
$sql->bindParam(':uid',$upid,PDO::PARAM_STR);

$sql->execute();

echo "<script>alert('Informations modifier avec success');</script>";

echo "<script>window.location.href='conducteur.php'</script>"; 
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
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:#fff;
        font-weight: 400;
        font-style: normal;

    }
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<body>
    <?php require_once "hfc/header.php";?>

        <div class="container"><br><br>
            <div>
                <h2 class="title-general_h2 text-center">formulaire de modification d'information</h2>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
                <div class="col-sm-8 col-md-6 col-lg-6"><br>

                    <?php 
                        // Get the contactid
                        $upid=intval($_GET['id']);
                        $sql = $requete->prepare('SELECT type_permi, nom_transport, information from conducteur where id=:uid');

                        
                        $sql->bindParam(':uid',$upid,PDO::PARAM_STR);

                        $sql->execute();

                        $results=$sql->fetchAll(PDO::FETCH_OBJ);

                        $cnt=1;
                        if($sql->rowCount() > 0)
                        {

                            foreach($results as $result)
                        {               
                    ?>

                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Votre types de permis</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="typePermi">
                                <option value="<?php echo htmlentities($result->type_permi);?>"><?php echo htmlentities($result->type_permi);?></option>
                                <option value="Poid légère">Poid légère</option>
                                <option value="Poid moyen">Poid moyen</option>
                                <option value="Poid lourd">Poid lourd</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type de transport</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="typeTransport">
                                <option value="<?php echo htmlentities($result->nom_transport);?>"><?php echo htmlentities($result->nom_transport);?></option>
                                <option value="Bus">Un Bus</option>
                                <option value="Mini-bus">Un Mini-bus</option>
                                <option value="7-Places">Un 7-Places</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ajoutez vos informations</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="information"><?php echo htmlentities($result->information);?></textarea>
                           
                        </div>
                        <?php }} ?>
                            <div class="form-group row text-center h4">
                                <!-- <div class="col-sm-10"> -->
                                    <input type="submit" name="update_conduct" id="" value="Ajouter la modification">
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