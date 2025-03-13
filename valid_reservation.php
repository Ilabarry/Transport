<?php
require "hfc/config.php";

// j'ai charger le PHPMailer
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_POST['reservation'])) {

    

    $depart = htmlspecialchars($_POST['depart']) ;
    $arriver = htmlspecialchars($_POST['arriver']) ;
    $date_time = htmlspecialchars($_POST['dateTime']) ;
    $rithme = htmlspecialchars($_POST['rithme'] ?? '') ;
    $moinsPransport = is_array($_POST['moinsPransport'] ?? [])? implode(',', $_POST['moinsPransport']): '';
    $email = htmlspecialchars($_SESSION['email']) ;

    // je confirme PHPMailer

    $mail = new PHPMailer(true);
    
    

    
        $query = $requete->prepare('SELECT id, prenom, nom FROM users WHERE email = :email');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            $userId = $user['id'];
            $prenom = $user['prenom'];
            $nom = $user['nom'];
    
            $result = $requete->prepare('INSERT INTO reservation(depart, arriver, date_time, rithme, moins_transport, id_users) VALUES(:dep, :arv, :dt, :rithme, :trans, :id_users)');
            $result->bindParam(':dep', $depart, PDO::PARAM_STR);
            $result->bindParam(':arv', $arriver, PDO::PARAM_STR);
            $result->bindParam(':dt', $date_time, PDO::PARAM_STR);
            $result->bindParam(':rithme', $rithme, PDO::PARAM_STR);
            $result->bindParam(':trans', $moinsPransport, PDO::PARAM_STR);
            $result->bindParam(':id_users', $userId, PDO::PARAM_INT);
            $result->execute();
            
            $reservationId = $requete->lastInsertId();
            
            $result = $requete->prepare('SELECT  reservation.*,users.prenom,users.nom FROM reservation INNER JOIN users ON reservation.id_users = users.id where reservation.id = :reservationId ;');
            $result->bindParam(':reservationId', $reservationId, PDO::PARAM_INT);
            $result->execute();
            $monReservation = $result->fetchAll(PDO::FETCH_ASSOC);  

            if ($monReservation){ 
                $rsevationdata = $monReservation[0] ?>

                <!doctype html>
                <html lang="en">
                  <head>
                    <title>resulta reservation</title>
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                
                    <!-- Bootstrap CSS -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                  
                  <style>
                        .container{
                          position:absolute;
                          top:80px;
                          left: 0;
                          /* width:100%; */
                          border:none;
                          z-index:1;
                          display:flex;
                          align-items:center;
                          justify-content:center;    
      
      
                        }
                        .container_2{
                          background-color: #eee;
                          height:480px;
                          border-radius:10px;
                        }
                        header
                            {
                            text-align: center;
                            background-color: #EEE;
                            margin-bottom: 20px;
                            padding: 10px;
                       }

                  </style>
                  </head>
                  <body>
                  <header class="text-white bg-success h4"> <a href="index.php" class="text-white bg-success px-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp; Mercie de verifier vos informations afin de ne pas confirmer vontre reservation avec des érreurs</header>
                      

                    <div class="container">
                      <div class="ml-5 px-5 py-2 container_2">
                          
                        <br>
                          <h3 class="text-success">Detail de la reservation :</h3>
                          <p><?php echo 'Prenom&Nom : '. htmlspecialchars($rsevationdata['prenom']) . ' ' . htmlspecialchars($rsevationdata['nom']); ?></p>
                          <p><?php echo 'Départ : '. htmlspecialchars($rsevationdata['depart']); ?></p>
                          <p><?php echo 'Diréction : '. htmlspecialchars($rsevationdata['arriver']); ?></p>
                          <p><?php echo 'Date&heur : '. htmlspecialchars($rsevationdata['date_time']); ?></p>
                          <p><?php echo 'Votre rithme : '. htmlspecialchars($rsevationdata['rithme']); ?></p>
                          <p><?php echo 'Moins de transport : '. htmlspecialchars($rsevationdata['moins_transport']); ?></p>
                        <p>Merci d'avoir utilisé notre service .</p>
                        <small>Un e-mail de confirmation vous a été envoyé.</small><br><br>
                        <p class="text-center bg-white py-2"><a href="update_reservation.php?id=<?php echo $rsevationdata['id'] ; ?>"><b class="text-success">Modifier</b></a></p>
                      </div>
                    </div>



<?php
// envoie de email
 
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
        $mail->Subject = 'Confirmation de reservation';
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
        // echo "<script> alert('Reservation confirmimée : Un e-mail de confirmation a été envoyé. ') </script>";

      } catch (exception $e) {
        echo "<script> alert('Reservation confirmimée : mai l\'envoi de l\'e-mail a échoué : {$mail->ErrorInfo}') </script>";
      }
      
      ?>
      <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                  </body>
                </html>

 <?php }
        
        
    } else {
        echo "Mercie de vous connecter avant de faire votre réservation";

    } 
                
}

?>