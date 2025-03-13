<?php
require "hfc/config.php";

    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


session_start(); 
if(!isset($_SESSION["email"]))  
 {  
   header("location:log/connexion.php");   
 }  

 if (!isset($_GET['id'])) {
    echo "<script>alert('Id de reservation est manquant');</script>";

    echo "<script>window.location.href='valid_reservation.php'</script>";
    exit();
 }

 $upid=intval($_GET['id']);


if(isset($_POST['update']))
{
// Posted Values 
    $depart = htmlspecialchars($_POST['depart']) ;
    $arriver = htmlspecialchars($_POST['arriver']) ;
    $date_time = htmlspecialchars($_POST['dateTime']) ;
    $rithme = htmlspecialchars($_POST['rithme'] ?? '') ;
    $moinsPransport = is_array($_POST['moinsPransport'] ?? [])? implode(',', $_POST['moinsPransport']): '';

    $mail = new PHPMailer(true);
    $email= $_SESSION['email'];
    $query = $requete->prepare('SELECT id, prenom, nom FROM users WHERE email = :email');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $userId = $user['id'];
    $prenom = $user['prenom'];
    $nom = $user['nom'];

    $sql=  $requete->prepare('UPDATE reservation SET depart=:dep, arriver=:arv, date_time=:dt , rithme=:rit , moins_transport=:trans WHERE id=:uid');

    $sql->bindParam(':dep',$depart,PDO::PARAM_STR);
    $sql->bindParam(':arv',$arriver,PDO::PARAM_STR);
    $sql->bindParam(':dt',$date_time,PDO::PARAM_STR);
    $sql->bindParam(':rit',$rithme,PDO::PARAM_STR);
    $sql->bindParam(':trans',$moinsPransport,PDO::PARAM_STR);
    $sql->bindParam(':uid',$upid,PDO::PARAM_STR);

    $sql->execute();


    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "barryila20@gmail.com";
        $mail->Password = "lkkz fltb wtvo folr";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('barryila20@gmail.com','service de Transport') ;
        $mail->addAddress($email);

        $mail->isHTML(false);
        $mail->Subject = 'mis a jour de reservation';
        $mail->Body = "Bonjour $prenom $nom \n\n";
        $mail->Body .= "Votre reservation a été enregistrée avec succés. \n";
        $mail->Body .= "Detail de la reservation :\n";
        $mail->Body .= "- Départ : $depart \n";
        $mail->Body .= "- Arriver : $arriver \n";
        $mail->Body .= "- Date et Heur : $date_time \n";
        $mail->Body .= "- Rithme : $rithme \n";
        $mail->Body .= "- Modes de transport : $moinsPransport \n\n";
        $mail->Body .= "Merci d'avoir utilisé notre service .";

        // var_dump($mail->Body);  Affiche le contenu du corps du message
        $mail->send();
        echo "<script> alert('vous avez reformulé votre reservation : Un e-mail de confirmation a été envoyé. ') </script>";

    } catch (exception $e) {
        echo "<script> alert('Reservation confirmimée : mai l\'envoi de l\'e-mail a échoué : {$mail->ErrorInfo}') </script>";
    }
// echo "<script>alert('Reservation modifier avec success');</script>";

echo "<script>window.location.href='reservation.php'</script>"; 
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

    .myformulaire{
       background:rgba(255, 255,255, 0.5);
       border-radius:10px;
    }
    .form{
        border-radius:10px;
        box-shadow:gray 4px 6px 10px;
    }

    input[type=datetime-local],input[type=text]{
        border:none;
        border-bottom:2px solid #2ecc71;
        transition:1.5s;
    }
    input[type=datetime-local],input[type=text]:hover{
        border:1px solid #2ecc71;
    }
    .form-check{
        line-height:30.5px;
    }
    input[type=submit]{
        background-color:#2ecc71 ;
        border:none;
        border-radius:8px;
        color:#fff;
        font-size:24px;
    }
    label{
        color:#2ecc71;
    }
    .title-general_h2{
        background:#2ecc71 ;
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

        <div class="container"><br>
            <div>
                <h2 class="title-general_h2 text-center">Mettre a jour votre reservation</h2>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
                <div class="col-sm-8 col-md-6 col-lg-6"><br>

                    <?php 
                        // Get the contactid
                        $upid=intval($_GET['id']);
                        $sql = $requete->prepare('SELECT depart,arriver,date_time,rithme,moins_transport from reservation where id=:uid');


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

                        
                        <div class="form px-2 py-3 bg-white">
                            <div class="form-group">
                                <label for="formGroupExampleInput">DEPART (adress de depart)</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="depart" value="<?php echo htmlentities($result->depart);?>">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">ARRIVEE (adress d'arrivée')</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="arriver" value="<?php echo htmlentities($result->arriver);?>">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Quand partez-vous (date de départ)</span></label>
                                <input type="datetime-local" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="dateTime" value="<?php echo htmlentities($result->date_time);?>">
                            </div><br>
                            <h4 class="text-center py-3 title-general">- Mon profil voyageur -</h4>
                            <div class="row"><br>
                                <div class="col-md-6">
                                    <b>Rithme de marche :</b>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rithme" id="exampleRadios1" value="Lent-marche" checked >
                                        <label class="form-check-label" for="exampleRadios1"> Lent (3 km/h) </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rithme" id="exampleRadios2" value="Moyen-marche" >
                                        <label class="form-check-label" for="exampleRadios2">Moyen (4 km/h) </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rithme" id="exampleRadios3" value="Rapide-marche" >
                                        <label class="form-check-label" for="exampleRadios3"> Rapide (5 km/h) </label>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <b>Rithme de cyclisme :</b><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rithme" id="exampleRadios1" value="Lent-cyclisme" checked >
                                        <label class="form-check-label" for="exampleRadios1"> Lent (10 km/h) </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rithme" id="exampleRadios2" value="Moyen-cyclisme" >
                                        <label class="form-check-label" for="exampleRadios2"> Moyen (15 km/h) </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rithme" id="exampleRadios3" value="Rapide-cyclisme" >
                                        <label class="form-check-label" for="exampleRadios3">Rapide (20 km/h) </label>
                                    </div>
                                </div>
                            </div><br>
                                    

                            <b class="text-center ml-5">Je souhaite inclure les modes suivants :</b><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="moinsPransport[]" id="exampleRadios1" value="Bus" checked >
                                <label class="form-check-label" for="exampleRadios1"><i class="fa fa-bus" aria-hidden="true"></i>  Les bus  </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="moinsPransport[]" id="exampleRadios2" value="Mini-bus">
                                <label class="form-check-label" for="exampleRadios2"><i class="fa fa-car" aria-hidden="true"></i> Mini-bus</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="moinsPransport[]" id="exampleRadios3" value="7-places" >
                                <label class="form-check-label" for="exampleRadios3"><i class="fa fa-taxi" aria-hidden="true"></i> Les 7-places </label>
                            </div>

                                <?php }} ?>

                            <input type="submit" name="update" id="" value="Ajouter la modification" class="px-5 py-2 mt-5">

                        </div>
                    </form>

                </div>
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
            </div>

        </div>

        
        

        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>
</body