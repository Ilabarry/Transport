
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .acceuil{
        background:rgba(0, 255,0, 0.19);
       border-radius:10px;
       height:420px;
    }
    .jumbotro .display-4 {
        border-bottom: 3px solid red;
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:yellow;
        font-family: "Rubik Glitch", serif;
        font-weight: 400;
        font-style: normal;
       font-weight:900 ;
    }
    .jumbotro h3{
        color:#808000;
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
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<body>
    <?php require_once "hfc/header.php";?>
        <img class="img_header" src="images/img_client.jpg" alt="" width="100%" height="420px">
        <div class="jumbotro acceuil"><br><br><br><br><br><br><br><br>
            <h1 class="display-4 text-center">COMMENTAIREs</h1>
            <p class="lead text-center">Confiance de voyager partous au sénégal dans la sécurité avec séneTransport </p>
            <hr class="my-2">
            <h3 class="text-center">- ASSISTANCE ET LE CLIENTEL -</h3>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br>

    <?php require_once "hfc/footer.php";?>
</body