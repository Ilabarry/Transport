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
    .jumbotro .display-4 {
        /* background:#2ecc71 ; */
        border-bottom: 3px solid red;
        padding:5px 20px;
        border-radius: 0 50% 0 50%;
        color:yellow;
        font-family: "Rubik Glitch", serif;
        font-weight: 400;
        font-style: normal;

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
        <img class="img_header" src="images/img_notation.jpg" alt="" width="100%" height="300px">
        <div class="jumbotro acceuil"><br><br><br><br><br><br><br><br>
            <h1 class="display-4 text-center">COMMENTAIRES</h1><br><br>
          
        </div>

        <div class="container"><br><br>
            <div>
                <h2 class="title-general_h2 text-center">formulaire de commentaires</h2>
                <b>NB: </b><p class="text-danger">Vous êtes conseillés de commenter avec toutes respet car toute personne qui dépasse ou insulte il sera automatiquement suprimée <span>(On dit que le respet et réciproque).</span> mercie de veiller sur ça !!!</p>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
                <div class="col-sm-8 col-md-6 col-lg-6"><br>

                

                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nom du conducteur</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Champ de commentaire</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Pouvez parler sur le conducteur, les clients , le moins de transports et bien d'autres dificultés ou bonnheur que vous avez rencontrer pendant le voyage .
                            </small>
                        </div>
                            <div class="form-group row text-center h4">
                                <input type="submit" name="" id="" value="Envoyer mon commentaire">
                            </div>
                    </form>

                </div>
                <div class="col-sm-2 col-md-3 col-lg-3"></div>
            </div>

        </div>

        
        

        <div style="height:100px"></div>
    <?php require_once "hfc/footer.php";?>
</body