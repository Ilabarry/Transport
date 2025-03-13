
<?php require "hfc/config.php"; ?>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .acceuil{
        background-image:url(images/image_acceuil.jpg);
        height:400px;
        background-repeat:no-repeat;
        background-position:bottom;
    }
    .jumbotron .display-4 {
       color:yellow;
       font-weight:900 ;
    }
    .jumbotron h3{
        color:yellow;
    }
    .bg{
        background: rgba(60, 60, 60, 0.3);
        z-index: 3;
    }
    .title_1{color:#2ecc71 ;text-transform:uppercase;}
    .title_2{color:yellow;}
    .title_3{color:red;}


    .section-1{
        position:absolute;
        top: -160px;
        left:0;
        width:100%;
        border:none;
        z-index:3;
        display:flex;
        align-items:center;
        justify-content:center;
        /* width: cover; */
        /* position:absolute; */
        /* margin-top:-120px; */
        /* margin-left:30px; */
        box-shadow:3px 3px 10px rgba(60, 60, 60, 0.9) ;
        border-radius:15px;
    }
    form input[type=submit]{
        background-color:#2ecc71 ;
        border:none;
        border-radius:8px;
        color:#fff;
        font-size:24px;
    }
    span,h4{
        color:yellow;
    }
    .container .title-general,.card-body .card-title{
        background:#2ecc71 ;
        /* border-bottom: 3px solid red; */
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:#fff;
        font-family: "Roboto", serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        font-variation-settings:"wdth" 100;

    }



.section_2{
        position:absolute;
        top: 460px;
        left:0;
        width:100%;
        border:none;
        display:flex;
        align-items:center;
        justify-content:center;
        margin-top:190px;
        z-index: -3;
        
    }

    .section_3{
        background:#ecf0f1;
        margin-top:200px
    }
    .card_trans{
        background: #fff;
        padding:10px;
        box-shadow:gray 3px 4px 7px;
    }

    iframe .video{
        position:absolute;
        top: 0;
        left:0;
        width:100%;
        border:none;
        z-index:3;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<body>
    <?php require_once "hfc/header.php";?>
    
    <div class="bg">
        <div class="jumbotron acceuil">
            <h1 class="display-4 text-center"><span class="title_1">sén</span><span class="title_2">voy</span><span class="title_3">age</span></h1>
            <p class="lead text-center text-white ">Confiance de voyager partous au sénégal dans la sécurité avec séneTransport </p>
            <hr class="my-2">
            <h3 class="text-center">- NOTRE MAISON -</h3>    
        </div>
    </div>

    <div class="container" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
    <div style="height: 370px;">
    <div class="section-1 bg-white p-4">
            <div class="card-deck pt-2">
                <iframe class="video" width="250" height="205" autoplay=1 src="https://www.youtube.com/embed/K1fDIaWdzfg?autoplay=1&mute=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="card rounded-circle px-2">
                    <div class="card-body">
                        <h5 class="card-titl text-center">Utilisateurs</h5>
                        <p class="card-text text-center" style="font-size: 40px; font-weight : bold"> <?php 
                            $users= $requete->prepare( "SELECT count(*) FROM users");
                            $users->execute();
                            $count = $users->fetchColumn();
                            echo $count;
                        ?></p>
                        <a href="#" class="btn btn-primary lg ml-4">Voir</a>
                    </div>
                </div>
                <div class="card rounded-circle px-3">
                <div class="card-body">
                        <h5 class="card-titl text-center">Clients</h5>
                        <p class="card-text text-center" style="font-size: 40px; font-weight : bold "> <?php 
                            $users= $requete->prepare( "SELECT count(*) FROM users where role='client' ");
                            $users->execute();
                            $count = $users->fetchColumn();
                            echo $count;
                        ?></p>
                        <a href="#" class="btn btn-primary lg ml-4">Voir</a>
                    </div>
                </div>
                <div class="card rounded-circle px-3">
                <div class="card-body">
                        <h5 class="card-titl text-center">Conducteurs</h5>
                        <p class="card-text text-center" style="font-size: 40px; font-weight : bold"> <?php 
                            $users= $requete->prepare( "SELECT count(*) FROM users where role='conducteur' ");
                            $users->execute();
                            $count = $users->fetchColumn();
                            echo $count;
                        ?></p>
                        <a href="#" class="btn btn-primary lg ml-4">Voir</a>
                    </div>
                </div>
                <iframe width="250" height="205" src="https://www.youtube.com/embed/AqhJmeDK-aQ?autoplay=1&mute=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay=1; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    </div>

    <div class="section_2">
        <div class="container">
            <div class="card mb-3">
                <div class="row no-gutters" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                    <div class="col-md-5">
                        <img src="images/image_propos.jpg" alt="..." width="355px" heigth="200px" class="img-fluide">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-titl text-centere text-center text-uppercase p-3 h3">QUI SOMMES NOUS ?</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container section_3 pb-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <h2 class="title-general text-center">nos différents moyens de transport</h2>
        <div class="card-deck mt-5">
            <div class="card card_trans" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                <img src="images/bus.jpg" class="card-img-top" alt="..." height="300px">
                <div class="card-body">
                <h5 class="card-titl text-centere text-center">les bus</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card card_trans" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                <img src="images/mini-bus.jpg" class="card-img-top" alt="..." height="300px">
                <div class="card-body">
                <h5 class="card-titl text-centere text-center">les mini bus</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card card_trans" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                <img src="images/7place.jpg" class="card-img-top" alt="..." height="300px">
                <div class="card-body">
                <h5 class="card-titl text-centere text-center">les 7 places</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="card mt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
            <img src="images/avion.jpg" class="card-img-top" alt="..." height="300px">
            <div class="card-body">
                <h5 class="card-titl text-centere text-center">voyage aérienne</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
            
    </div>

<br>
    

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <?php require_once "hfc/footer.php";?>
</body>

<script>
  AOS.init();
</script>
