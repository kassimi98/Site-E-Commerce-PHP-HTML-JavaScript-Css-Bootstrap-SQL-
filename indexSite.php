<?php
session_start();
require_once('fonction_panier.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ACCUEIL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Bootstrap 3 template for corporate business" />

  <!-- Theme skin -->
  <link id="t-colors" href="skins/default.css" rel="stylesheet" />

  <!-- boxed bg -->
  <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />



  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">BOUTIQUE E-COMMERCE</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
         <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="indexSite.php">Accueil</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="hommeex.php">Homme</a>
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

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in"></div>
        <div class="intro-heading text-uppercase"></div><br><br><br><br>
        <div><br><br><br></div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Plus D'information</a>
      </div>
    </div>
  </header>

  <!-- Services -->
  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase" style="color: #e4e0e0">Services</h2>
          <h3 class="section-subheading text-muted">Infos sur Shopping Paiement et Autres.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading" style="color: #e4e0e0">Shopping</h4>
          <p class="text-muted"> Notre site vous offre la possibilité d'explorer et acheter votres préférables produits,et pour toutes les générations .</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading" style="color: #e4e0e0">En Ligne</h4>
          <p class="text-muted">Le service en ligne vous permet de nous contacter ainsi d'effecter des commandes personnel dans notre page assistance ou par les réseaux sociaux.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-dollar-sign fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading" style="color: #e4e0e0">Paiement</h4>
          <p class="text-muted">Suite a vos achats nous vous proposons d'effectuer le paiement en toute sécurité par votre compte PayPal ou par la méthode de paiement après Livraison .</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="bg-light" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Produits Avec Promotion</h2>
          <h3 class="section-subheading text-muted">Votre boutique en ligne pour toutes les Générations .</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="hommeex.php">
            <!-- <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div> -->
            <img class="img-fluid" src="img/portfolio/acch1.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Adulte</h4>
            <!-- <p class="text-muted">Illustration</p> -->
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="enfantex.php">
            <!-- <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div> -->
            <img class="img-fluid" src="img/portfolio/acce1.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Bébé</h4>
            <!-- <p class="text-muted">Graphic Design</p> -->
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="femmeex.php">
            <!-- <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div> -->
            <img class="img-fluid" src="img/portfolio/accf1.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Femme</h4>
            <!-- <p class="text-muted">Identity</p> -->
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="hommeex.php">
            <!-- <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div> -->
            <img class="img-fluid" src="img/portfolio/acch2.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Homme</h4>
            <!-- <p class="text-muted">Branding</p> -->
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="enfantex.php">
            <!-- <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div> -->
            <img class="img-fluid" src="img/portfolio/acce22.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Garçon</h4>
            <!-- <p class="text-muted">Website Design</p> -->
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="femmeex.php">
            <!-- <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div> -->
            <img class="img-fluid" src="img/portfolio/accf2.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Fille</h4>
           <!--  <p class="text-muted">Photography</p> -->
          </div>
        </div>
      </div>
    </div>
  </section>
<br><br><br>
<div class="container" name="about" >
  <center><h1 style="color: #e4e0e0">🖋Coup D'oeil Sur Notre Site🖋</h1></center>
      <hr style="color: #e4e0e0">

    <div class="row white">
      <br>
      
      <div class="col-lg-6" style="color: #97958f">
       <!-- <p>We believe ideas come from everyone, everywhere. In fact, at TemplateMag, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft.
          These truths drive us, motivate us, and ultimately help us redefine the power of design. We’re big believers in doing right by our neighbors. After all, we grew up in the Twin Cities and we believe this place has much to offer. So we do what
          we can to support the community we love.</p> -->

          <p>En un mot, le commerce électronique est simplement le processus d’achat et de vente de produits par des moyens électroniques tels que les applications mobiles et Internet. Le commerce électronique désigne à la fois les transactions en ligne et les transactions électroniques. Le commerce électronique a énormément gagné en popularité au cours des dernières décennies et remplace en quelque sorte les magasins traditionnels de brique et de mortier.
          </p>
      </div>
      <!-- col-lg-6 -->

      <div class="col-lg-6" style="color: #97958f">
        <!-- <p>Over the past four years, we’ve provided more than $1 million in combined cash and pro bono support to Way to Grow, an early childhood education and nonprofit organization. Other community giving involvement throughout our agency history includes
          pro bono work for more than 13 organizations, direct giving, a scholarship program through the Minneapolis College of Art & Design, board memberships, and ongoing participation in the Keystone Club, which gives five percent of our company’s
          earnings back to the community each year.</p> -->
          <!-- <p>Ce site e-commerce fait le sujet d'un projet de fin d'études realisé par le binome constitué de l'étudiant <u>Abdelaili Batchi</u> et <u>Amine Kassimi</u> sous l'encadrement du professeur <u><i>Mr.Ibrahim Ouchaou</i></u>, dans le cadre de formation à la Faculté des sciences et techniques d'Errachidia (F.S.T.E).   </p> -->
          <p>Le commerce électronique vous permet d’acheter et de vendre des produits sur échelle globale, vingt-quatre heures par jour sans encourir les mêmes frais généraux que si vous exécutiez un magasin de briques et de mortier. Pour le meilleur mix marketing et le meilleur taux de conversion, une entreprise de commerce électronique devrait également être présente physiquement; Ceci est mieux connu comme un magasin de clic et de mortier.</p>
      </div>
      <!-- col-lg-6 -->
    </div>
    <!-- row -->
  </div>
  <!-- container -->

  <!-- ==== SECTION DIVIDER1 -->
<!--   <section class="section-divider textdivider divider1"> -->
    <div class="container" style="color: #a9a5a5" align="center">
      <h1>Réalisation</h1>
     <!--  <hr> -->
      <!-- <p >To achieve real change, we have to expand boundaries. Because the Wild West of what-could-be is unexplored but rife with opportunity.</p> -->
      <p>Ce modèle de site e-commerce est un sujet d'un projet de fin d'études, realisé par le binome constitué de l'étudiant <u>Abdelaali Batchi</u> et <u>Amine Kassimi</u> sous l'encadrement du professeur <u><i>Mr.Ibrahim Ouchaou</i></u>, dans le cadre de formation à la Faculté des sciences et techniques d'Errachidia (F.S.T.E).<br>*Année Universitaire 2018/2019*</p>
    </div> <br><br><br><br>
  

  <!-- Footer -->
  <footer >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span class="copyright">Copyright © site E-Commerce 2019</span>
        </div>
        <br><br>
        <div class="col-md-12">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
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

 

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>
