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
 require_once('paypal.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Se Connecter</title>
    <meta name="description" content="">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
        <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">


    <!-- bar -->
    
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/pagency.min.css" rel="stylesheet">

  </head>
    <!-- navbar-->
    <body  id="connect" >
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
            <a class="nav-link js-scroll-trigger" href="#connect">Login</a>
          </li>
        <?php } ?>
         <?php if (!isset($_SESSION['user_pseudo'])) {?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="register.php">S'Inscrire</a>
          </li>
        <?php }else{?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="myaccount.php">Mon Compte</a>
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
<!--  -->
<?php 
if (!isset($_SESSION['user_pseudo'])) {
  
?>
<br> <br> <br> <br> <br>
  <section id="contact" > 
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Se Connecter</h2>
          <h3 class="section-subheading text-muted">Remplir le formulaire ci-dessous.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
    <form id="contactForm" action="" method="POST"  name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-4" align="center">
                
                <div class="form-group">
              <input class="form-control" type="email" placeholder=" Email *" name="email"
               required="required" data-validation-required-message="Please enter your email address." required>
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
          <input class="form-control" type="password" placeholder="Mot de passe *" name="password"
           required="required" data-validation-required-message="enter your password." required>
                  <p class="help-block text-danger"></p>
                </div>
                
              </div>
              
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <?php

    if (isset($_POST['submit'])){
     
        $email=$_POST['email'];
        $password=$_POST['password'];
        
       if ($email&&$password) {

        $select=$db->query("SELECT pseudo FROM users WHERE email='$email'AND password='$password'");

           if ($select->fetchColumn()) { 

            $select=$db->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
            $result=$select->fetch(PDO::FETCH_OBJ); 

            $_SESSION['user_pseudo']=$result->pseudo;
            $_SESSION['user_nom']=$result->nom;
            $_SESSION['user_email']=$result->email;
            $_SESSION['user_password']=$result->password;
            $_SESSION['user_adresse']=$result->adresse;
           echo"<p><font  color='#35d55b'> Vous pouvez aller a votre </font><a  href='myaccount.php'><font color='#356d50'>Compte</font></a>.</p>";

          }else{

          echo"<p><font  color='#bb4b4b'> Mauvais identifiant </font>.</p>";
         
             }      
 
       }else{
        echo"<p><font  color='#bb4b4b'> Vueillez remplir tous les champs !<font></p>";
      }
   }
  ?>
           <div class="col-lg-12 text-center">     
      <h2><a href="register.php">Vous n'avez pas un Compte .</a></h2><br>
      <h2><a href="indexSite.php"><i class="fa fa-home"></i> Accueil</a></h2><br>
    </div>
    <br><br>
                <div id="success"></div><br><br>
    <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit"  name="submit"><i class="fa fa-sign-in"></i> Envoyer </button>
              </div>
              <div class="col-lg-4"></div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>
  <?php
   }else{
  // header('location:myaccount.php');
  }
  ?>
<!--  -->
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
              <a href="www.twitter.com">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="www.facebook.com">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="www.instagram.com">
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
  <!--  -->
  
<!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
    <!-- nb -->
    <script src="js/modernizr.custom.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/animate.js"></script>
  <script src="js/custom.js"></script>
  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
  </body>
</html>


