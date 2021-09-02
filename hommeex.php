<?php
session_start();
try{
 $db= new PDO('mysql:host=localhost;dbname=site-e-commerce','root','');
  $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
 echo "une erreur est survenue";    
 die(); }
 require_once('fonction_panier.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
  <link href="css/cubeportfolio.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <!-- Theme skin -->
  <link id="t-colors" href="skins/default.css" rel="stylesheet" />
  <!-- boxed bg -->
  <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
   <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  <title>HOMME</title>


  <!-- Custom fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles  -->
  <link href="css/pagency.min.css" rel="stylesheet">

</head>
<body  id="homme">
   <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="indexSite.php">BOUTIQUE E-COMMERCE</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
         <!--  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="indexSite.php">Accueil</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#homme">Homme</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="femmeex.php">Femme</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="enfantex.php" hover="">Enfant</a>
          </li>
          <?php if (!isset($_SESSION['user_pseudo'])) {?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="connect.php">login</a>
          </li>
        <?php } ?>
         <?php if (!isset($_SESSION['user_pseudo'])) {?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="register.php">S'Inscrire</a>
          </li>
        <?php }else{?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="myaccount.php">Compte</a>
          </li>

       <?php }?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="panier.php"><?php echo compterArticles();?>🛒</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.php">Assistance</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div><br><br><br><br><br><br><br><br><br></div>
  <!-- start slider -->
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- Slider -->
            <div id="main-slider" class="main-slider flexslider">
              <ul class="slides">
                <li>
                  <img src="img/slides/flexslider/h11.jpg" alt="" />
                  <div class="flex-caption">
                   <h3>Modernite</h3>
            <p>Duis fermentum auctor ligula ac malesuada. Mauris et metus odio, in pulvinar urna</p>
                     
                  </div>
                </li>
                <li>
                  <img src="img/slides/flexslider/h22.jpg" alt="" />
                  <div class="flex-caption">
                    <h3>Autenticite</h3>
                    <p>Sodales neque vitae justo sollicitudin aliquet sit amet diam curabitur sed fermentum.</p>
                    <!-- <a href="#" class="btn btn-theme">Learn More</a> -->
                  </div>
                </li>
                <li>
                  <img src="img/slides/flexslider/h33.png" alt="" />
                  <div class="flex-caption">
                    <h3>Produit du mois</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit donec mer lacinia.</p>
                  </div>
               </li>
              </ul>
             </div>
            <!-- end slider -->
          </div>
        </div>
  
<section class="bg-light" id="portfolio">
    <div class="container" style="background-color:#ececec;">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">GALERIE DE PRODUITS</h2>
  <h3 class="section-subheading text-muted" align="center">Choisissez Votre Categorie .</h3>
          <div class='col-lg-12 '>
            <?php                    
            $select=$db->query("SELECT DISTINCT categorie FROM productsh WHERE genre='homme'");

      while ($s=$select->fetch(PDO::FETCH_OBJ) ){
        //    $cat=$s->categorie;
        // $select=$db->prepare("SELECT count(id) as conteur FROM productsh  where  genre=? AND categorie=?  ");
        //       $select->execute(array('femme','$cat'));
        //       $s=$select->fetch(PDO::FETCH_OBJ);
              
        //       if ($s->conteur > 0) {
              ?>
      <a style="background-color:#414141; border-color:#414141; " class='btn btn-primary btn-x text-uppercase' href='?action=<?php echo $s->categorie ;?>'><?php echo $s->categorie;?></a>
      <?php     
              
      }
      ?>
             </div><br><br>

          <h3 class="section-subheading text-muted" align="center">Explorez et Achetez votres meilleurs produits.</h3>
        </div>
      </div>
      <?php
            if (isset($_GET['action'])) {
          
          if ($_GET['action']) {
           
             $select=$db->prepare("SELECT * FROM productsh  where  genre=? AND categorie=?  ");
              $select->execute(array('homme',$_GET['action']));

             echo "<div class='row' >";
        
             while ($s=$select->fetch(PDO::FETCH_OBJ)){

            echo "<div class='col-md-2 col-sm-4 portfolio-item' >";
         ?>
          <a class='portfolio-link' target="description.php"  href='description.php?show=<?php echo  $s->titre ;?>&amp;d=<?php echo  $s->description ;?>&amp;p=<?php echo  $s->prix ;?>&amp;c=<?php echo  $s->categorie;?>&amp;g=<?php echo  $s->genre;?>&amp;st=<?php echo  $s->stock ;?>'>
            <?php
                      echo "<div class='portfolio-hover'>";
              echo "<div class='portfolio-hover-content'>";
       echo "👁‍🗨Détails"; 
            echo "</div>";
            echo "</div>";
            ?>
            <img class='img-fluid' src='admin/images/<?php echo $s->titre;?>.jpg' alt=''><?php
            echo "</a>";
        
         echo "<div class='portfolio-caption'>";
         
          echo "<h4 class=' text-uppercase'>".$s->titre."</h4><br>";
          echo "<h5 class=\"text-muted\">Prix:"." ".$s->prix.".00DH</h5>";
          // echo "<p class=\"text-muted\">stock:"." ".$s->stock.".U</p>";
           
          if ($s->stock > 0) {
          ?>
  <a class='btn btn-primary btn-x text-uppercase' href='panier.php?action=ajout&amp;
  l=<?php echo  $s->titre;?>&amp;q=1&amp;p=<?php echo  $s->prix ;?>'>Ajouter 🛒</a>
        <?php }else{
          
          echo"<h6 class='btn btn-primary' >stock épuisé !</h6>";
        }
           echo "</div>";
           echo "</div>";
       
            }}
//             
        }else {
                      $select=$db->prepare("SELECT * FROM productsh WHERE genre=? ");
             $select->execute(array('homme'));

             echo "<div class='row' >";
        
             while ($s=$select->fetch(PDO::FETCH_OBJ)){

            echo "<div class='col-md-2 col-sm-4 portfolio-item' >";
          ?>
          <a class='portfolio-link' target="description.php"  href='description.php?show=<?php echo  $s->titre ;?>&amp;d=<?php echo  $s->description ;?>&amp;p=<?php echo  $s->prix ;?>&amp;c=<?php echo  $s->categorie;?>&amp;g=<?php echo  $s->genre;?>&amp;st=<?php echo  $s->stock ;?>'>
            <?php
                      echo "<div class='portfolio-hover'>";
              echo "<div class='portfolio-hover-content'>";
       echo "👁‍🗨Détails"; 
            echo "</div>";
            echo "</div>";
            ?>
            <img class='img-fluid' src='admin/images/<?php echo $s->titre;?>.jpg' alt=''><?php
            echo "</a>";
        
         echo "<div class='portfolio-caption'>";
         
          echo "<h4 class=' text-uppercase'>".$s->titre."</h4><br>";
          echo "<h5 class='text-muted'>Prix:"." ".$s->prix.".00DH</h5>";
          // echo "<p class=\"text-muted\">stock:"." ".$s->stock.".U</p>";
          
            
          if ($s->stock > 0) {
          ?>
  <a class='btn btn-primary btn-x text-uppercase' href='panier.php?action=ajout&amp;
  l=<?php echo  $s->titre;?>&amp;q=1&amp;p=<?php echo  $s->prix ;?>'>Ajouter 🛒</a>
        <?php }else{
          
          echo"<h6 class='btn btn-primary btn-x ' >Stock épuisé !</h6>";
        }
           echo "</div>";
           echo "</div>";

            }
        }
            ?>
    </div>
  </section>

   

  
  <!-- Footer -->
  <footer >
    <div class="container" background="../img/bodybg/bg1.png">
      <div class="row">
        <div class="col-md-12">
          <span class="copyright">Copyright © site E-Commerce 2019</span>
        </div>
        <div class="col-md-12">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="http://www.twitter.com">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="http://www.facebook.com">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="http://www.instagram.com">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
         <div class="col-md-4"> 
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              
            </li>
            <li class="list-inline-item">
              
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script src="js/modernizr.custom.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="plugins/flexslider/jquery.flexslider-min.js"></script>
  <script src="plugins/flexslider/flexslider.config.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/classie.js"></script>
  <script src="js/uisearch.js"></script>
  <script src="js/jquery.cubeportfolio.min.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/animate.js"></script>
  <script src="js/custom.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts -->
  <script src="js/agency.min.js"></script>
</body>
</html>