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
require_once('Paypal.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>checkout 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
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
    <body  id="page-top">
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
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="indexSite.php">Accueil</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Homme.php">Homme</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Femme.php">Femme</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Enfant.php">Enfant</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">infoSite</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="panier.php">🛒Panier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.php">ASSISTANCE</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <br><br><br><br><br><br><br><br><br><br><br>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><h6>🛒Panier</h6></li>
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Payment</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-12">
              <div class="box">
                <form method="get" action="checkout2.php">
                  <h1>Checkout - Payment</h1>
                  <div class="nav flex-column flex-md-row nav-pills text-center">
                    <a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center active">
                     <i class="fa fa-money ">   </i>Methode de Payment</a>
                     <!-- <a href="#" class="nav-lin flex-sm-fill text-sm-center disabled"> 
                      <i class="fa fa-truck"> </i> Methode de Livraison</a> -->
                      <a href="#" class="nav-link flex-sm-fill text-sm-center disabled">
                       <i class="fa fa-map-marker"> </i>Addresse </a>
                       <a href="#" class="nav-link flex-sm-fill text-sm-center disabled">
                        <i class="fa fa-eye"> </i>Order Review</a>
                      </div>
                      <!-- payment -->

                      <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Paypal</h4>
                          <p>We like it all.</p>
                          <div class="box-footer text-center" id="paypal-button-container">
<!--                             <h4><a href="">👉Payez vos achats par Pay Pal</a></h4>
 -->                            <!-- PAYPAL -->
                           
                            <!--  -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Carte Banquaire</h4>
                          <p>VISA and Mastercard only.</p>
                          <div class="box-footer text-center">
                            <h4>ce service n'est pas accecible maintenant</h4>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Cash apres livraison </h4>
                          <p>You pay when you get it.</p>
                          <div class="box-footer text-center">
                            <h4><a href="">👉Adresse</a></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                      <!-- fin  -->
                 
          <div class="box-footer d-flex justify-content-between"><a href="panier.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Retour</a>
    <button type="submit" class="btn btn-primary">Choisir Methode de livraison <i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
            <!-- <div class="col-lg-3">
              <div id="order-summary" class="card">
                <div class="card-header">
                  <h3 class="mt-4 mb-4">Order summary</h3>
                </div>
                <div class="card-body">
                  <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Order subtotal</td>
                          <th>$446.00</th>
                        </tr>
                        <tr>
                          <td>Shipping and handling</td>
                          <th>$10.00</th>
                        </tr>
                        <tr>
                          <td>Tax</td>
                          <th>$0.00</th>
                        </tr>
                        <tr class="total">
                          <td>Total</td>
                          <th>$456.00</th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
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
    <!-- JavaScript files--
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>--
    -->
    <!-- paypal --
     <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
     <script>paypal.Buttons().render('#paypal-button-container');</script>
        <!-- nb -->
    <script src="js/modernizr.custom.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/animate.js"></script>
  <script src="js/custom.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>
  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
  </body>
</html>