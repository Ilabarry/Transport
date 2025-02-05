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
        margin-top:-120px;
        margin-left:130px;
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
        border-bottom: 3px solid red;
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:yellow;
        font-family: "Rubik Glitch", serif;
        font-weight: 400;
        font-style: normal;

    }




    .container .section_2{
        margin-top:190px;
        z-index: 3;
        
    }

    .section_3{
        background:#ecf0f1;
    }
    .card_trans{
        background: #fff;
        padding:10px;
        box-shadow:gray 3px 4px 7px;
    }
    
</style>
<link rel="icon" type="image" href="senvoyagee.png">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<body>
    <?php require_once "hfc/header.php";?>
    
    <div class="bg">
        <div class="jumbotron acceuil">
            <h1 class="display-4 text-center mt-5"><span class="title_1">sén</span><span class="title_2">voy</span><span class="title_3">age</span></h1>
            <p class="lead text-center text-white ">Confiance de voyager partous au sénégal dans la sécurité avec séneTransport </p>
            <hr class="my-2">
            <h3 class="text-center">- NOTRE MAISON -</h3>    
        </div>
    </div>

    <div class="section-1 bg-white pb-5 pl-5">
        <div class="container" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
            <h2 class="text-center py-3 title-general">OU PATEZ-VOUS</h2>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="formGroupExampleInput">DEPART (adress de depart) <span>obligatoire</span></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="formGroupExampleInput">ARRIVEE (adress d'arrivée') <span>obligatoire</span></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Quand partez-vous (date de départ) <span>obligatoire</span></label>
                            <input type="datetime-local" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <input type="submit" name="" id="" value="Envoyer" class="px-5 py-2 mt-5">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="container">
        <div class="section_2">
            <div class="card mb-3">
                <div class="row no-gutters" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                    <div class="col-md-5">
                        <img src="images/image_propos.jpg" alt="..." width="405px" heigth="200px">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title text-center text-uppercase p-3 h3">QUI SOMMES NOUS ?</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container section_3 py-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <h2 class="title-general text-center mt-5">nos différents moyens de transport</h2>
        <div class="card-deck mt-5">
            <div class="card card_trans" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                <img src="images/bus.jpg" class="card-img-top" alt="..." height="300px">
                <div class="card-body">
                <h5 class="card-title text-center">les bus</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card card_trans" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                <img src="images/mini-bus.jpg" class="card-img-top" alt="..." height="300px">
                <div class="card-body">
                <h5 class="card-title text-center">les mini bus</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card card_trans" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                <img src="images/7place.jpg" class="card-img-top" alt="..." height="300px">
                <div class="card-body">
                <h5 class="card-title text-center">les 7 places</h5>
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
                <h5 class="card-title text-center">voyage aérienne</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
            
    </div>


    <div style="height:200px"></div>
    

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <?php require_once "hfc/footer.php";?>
</body>

<script>
  AOS.init();
</script>
