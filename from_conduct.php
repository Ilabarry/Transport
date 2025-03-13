<?php
require "hfc/config.php";
session_start(); 
if(!isset($_SESSION["email"]))  
 {  
   header("location:log/connexion.php");   
 }  



if (isset($_POST['conducteur'])) {

    
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

    $file= $_FILES['image'];
    $typePermi = $_POST['typePermi'];
    $typeTransport = $_POST['typeTransport'];
    $information = $_POST['information'];
    $email = $_SESSION['email'];
    
    $nomImg= basename($file['name']);
    $stockImg= 'uploads/';

    if (!is_dir($stockImg)) {
        mkdir($stockImg,0755,true);
    }

    $deplaceImg = $stockImg . $nomImg;
    if (move_uploaded_file($file['tmp_name'],$deplaceImg)) {
        $query = $requete->prepare('SELECT id FROM users WHERE email = :email');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            $userId = $user['id'];
            $profil = $deplaceImg;
    
            $result = $requete->prepare('INSERT INTO conducteur(type_permi, nom_transport, information, profil, id_users) VALUES(:permis, :transport, :info, :profil, :id_users)');
            $result->bindParam(':permis', $typePermi, PDO::PARAM_STR);
            $result->bindParam(':transport', $typeTransport, PDO::PARAM_STR);
            $result->bindParam(':info', $information, PDO::PARAM_STR);
            $result->bindParam(':profil', $profil, PDO::PARAM_STR);
            $result->bindParam(':id_users', $userId, PDO::PARAM_INT);
            $result->execute();
            echo "<script>alert('information aJouter avec succé ')</script>";  
            echo "<script>window.location.href='conducteur.php'</script>";
        } else {
            echo "User not found.";
        }
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
       height:220px;
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
        <div class="jumbotro acceuil"><br><br><br>
            <h1 class="display-4 text-center">AJOUTER MES INFORMATIONS</h1>
          
        </div>

        <div class="container"><br>
            <div>
                <h2 class="title-general_h2 text-center">Obligatoire de remplir ce formulaire</h2>
                <b>NB: </b><p class="text-danger">Soyez prudant, faut pas dire ce que vous n'êtes pas oubien ce que vous ne povez pas faire merci !!! </p>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
                <div class="col-sm-8 col-md-6 col-lg-6"><br>

                

                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ajouter une image professionnelle</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Votre types de permis</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="typePermi">
                                <option value="">Selectioner le votre</option>
                                <option value="Poid légère">Poid légère</option>
                                <option value="Poid moyen">Poid moyen</option>
                                <option value="Poid lourd">Poid lourd</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type de transport</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="typeTransport">
                                <option value="">Selectioner le votre</option>
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
                                    <input type="submit" name="conducteur" id="" value="Ajouter mes informations">
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