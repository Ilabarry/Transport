






<style>
*{
    padding:0;
    margin:0;
    box-sizing:border-box;
}
    .jumbotron .display-4 {
        margin-top:100px;
       color:#808000;
       font-weight:900 ;
    }
    .jumbotron h3{
        color:#808000;
    }

    .map{
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100vh;
        border:none;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .map iframe{
        display: block;
        height:100%;
        /* z-index:1; */
    }
    

    .formulaire{
        position: absolute;
        margin-top:20px;
        z-index:1;
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

    .container .title-general{
        background:#2ecc71 ;
        /* border-bottom: 3px solid red; */
        /* padding:5px 20px; */
        border-radius: 0 50% 0 50%;
        color:#fff;
        font-family: "Roboto", serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        font-variation-settings:"wdth" 100;
    }

    label{
        color:#2ecc71;
    }
    span{
        color:yellow;
    }

</style>
<link rel="icon" type="image" href="senvoyagee.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <?php require_once "hfc/header.php";?>

    <div class="container formulaire">
        <form class="col-md-5 py-4 myformulaire" action="valid_reservation.php" method="POST">
            <div class="form px-2 py-3 bg-white">
                <h4 class="text-center py-3 title-general">FETES VOTRE RESERVATION</h4>
                <div class="form-group">
                    <label for="formGroupExampleInput">DEPART (adress de depart) <span>obligatoire</span></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="depart">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">ARRIVEE (adress d'arrivée') <span>obligatoire</span></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="arriver">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Quand partez-vous (date de départ) <span>obligatoire</span></span></label>
                    <input type="datetime-local" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="dateTime">
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

                <input type="submit" name="reservation" id="" value="Envoyer" class="px-5 py-2 mt-5">

            </div>
        </form>
    </div>
<?php
    if(isset($_POST["reservation"])){

    $adress=$_POST["arriver"];
    $myAdress=urlencode($adress);

}

?>
<iframe id="carte" src="https://www.google.com/maps?q=<?php echo $myAdress;?>&output=embed" width="100%" height="177%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>




    





    <?php require_once "hfc/footer.php";?>



    <script>

        $(document).ready(function () {

            console.log("Document ready, showing map...");
            $('#carte').show();
        });

    </script>