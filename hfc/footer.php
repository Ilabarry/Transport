

<style>
    .footer{
        background-color:#2ecc71  ;

    }
    .title-general{
        background:#2ecc71 ;
        border-bottom: 3px solid red;
        /* padding:5px 20px; */
        border-radius: 0 50% 0 50%;
        color:yellow;
        font-family: "Rubik Glitch", serif;
        font-weight: 400;
        font-style: normal;
    }
    ul li{
        list-style:none;
    }
    ul li  .a_footer{
        text-decoration:none;
        font-size:24px;
        color:#fff;
    }
    ul li  .a_footer:hover{
        color:#fff;
        border:none;
        font-size:25px;
    }
    .i_footer{
        color:#fff;
        border:1px solid #fff;
        border-radius:50%;
        padding:10px;
    }

    p a i{
        border:1px solid #fff;
        border-radius:50%;
        padding:10px;
        transition:1s;
    }
    p a i:hover{
        color:#fff;
        font-size:25px;
    }

    pre{
        margin-top:-110px;
        color:red;
        text-align:center;
        /* margin-left:90px; */
    }
   
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="jumbotron footer">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-3">
        <h2 class="text-center py-3 title-general mb-3">NOS SERVICES</h2>
            <p class="text-white">
                SENVOYAGE depui le sénégal est un site créer pour faciliter le transport dans ce beau pay de la téranga .
                Nous méttons en place des services qui nous permet d' aider <b>les handicapes , les personnes âgés , les petites enfants et des parent qui avec leurs enfants</b>
                pour faciliter mais aussi sécuriser ces gens pandant leurs voyages. <a href="">plus...</a> 
            </p>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <h2 class="text-center py-3 title-general mb-3">SENVOYAGE(menu)</h2>
        <ul>
            <li><i class="fa fa-home i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer">homme</a></li>
            <li><i class="fa fa-book i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer"> reservation</a></li>
            <li><i class="fa fa-comments i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer"> commantaires</a></li>
            <li><i class="fa fa-users i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer">Assistance </a></li>
            <li><i class="fa fa-user-circle i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer">conducteurs</a></li>
        </ul>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <h2 class="text-center py-3 title-general mb-3">NOS ADRESSES</h2>
        <ul>
            <li><i class="fa fa-map-marker i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer">afrique / sénégal</a></li>
            <li><i class="fa fa-phone i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer"> 33 215 00 00</a></li>
            <li><i class="fa fa-whatsapp i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer"> 78 012 33 33</a></li>
            <li><i class="fa fa-envelope i_footer" aria-hidden="true"></i><a href="" class="text-decoration-none px-3 a_footer">senvoyage@sen.sn</a></li>
        </ul>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <h2 class="text-center py-3 title-general mb-3">RESEAU SOCIAUX</h2>
        <form class="form-inline ml-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="post">
            <div class="form-group mx-sm-3 mb-2">
                <input type="email" class="form-control" name="footer" id="inputPassword2" placeholder="Entrez votre e-mail">
            </div>
            <button type="submit" class="btn btn-warning mb-2" name="submit"><i class="fa fa-paper-plane-o text-white" aria-hidden="true"></i></button>
        </form><br>
        <h3 class="text-center">nos fréquences</h3>
        <div class="row">
            <p class="text-center ml-5 pl-2 mt-4">
                <a href="" class="text-decoration-none px-3 text-white h1"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="" class="text-decoration-none px-3 text-white h1"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="" class="text-decoration-none px-3 text-white h1"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            </p>
        </div>
    </div>
  </div>
  <hr class="mt-4">
  <p class="text-center text-white">Copyright&copy;221 senvoyage au sénégal.tous droits réservé</p>

</div>

<?php

if (isset($_POST['submit'])) {
    $footer=htmlspecialchars($_POST['footer']);
    if (empty($footer)) {
        echo "<pre class='b-footer-php'> Vous avez rien envoyé mieu vaux renseigner le champ</pre>";
    }else {
        echo "<pre class='b-footer-php'>Mercie de ce travail magnifique</pre>";
    }
}

?>