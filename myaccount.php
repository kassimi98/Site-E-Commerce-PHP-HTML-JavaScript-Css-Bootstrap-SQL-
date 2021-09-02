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
 
  <title>Mon compte</title>


  <!-- Custom fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles  -->
  <link href="css/pagency.min.css" rel="stylesheet">

</head>
<body  id="myaccount">
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
            <a class="nav-link js-scroll-trigger" href="connect.php">Login</a>
          </li>
        <?php } ?>
         <?php if (!isset($_SESSION['user_pseudo'])) {?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="register.php">S'Inscrir</a>
          </li>
        <?php }else{?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#myaccount">Compte</a>
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

<section id="payment">


<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              
            </div>
            <div id="checkout" class="col-lg-12">
              <div class="box">
<!--                 <form method="get" action="checkout2.php">-->  
                 <h1 style="color: #d8dbd8">👨‍⚖️Mon Compte</h1>
                 <br><br>
                 <div >
                  <pre style="background-image: url('admin/images/bg3.jpg');"><br><br><br>
<h3 style="color:#848e86 ">🔳 Nom et Prenom    : </h3><h4 style="color: "> <?php echo $_SESSION['user_nom'];?> <h4>  
<h3 style="color:#848e86 ">🔳 E-Mail           : </h3><h4 style="color: ">  <?php echo $_SESSION['user_email'];?> <h4>  
<h3 style="color:#848e86 ">🔳 Adresse          : </h3><h4 style="color: ">  <?php echo $_SESSION['user_adresse'];?><h4> 

<h3 style="color:#848e86 ">🔳 Produits achetés   :
 </h3><h4 style="color: ">  <?php
            $psd=$_SESSION['user_pseudo'];
         
      $select=$db->query("SELECT Distinct produit, datec,total_tva,frais_de_port  FROM commande where pseudo=$psd");
      while ($s=$select->fetch(PDO::FETCH_OBJ)) {
       echo '<br>* Produit  :' .$s->produit.'<br>'.'* Prix Total :'.$s->total_tva.'Dh<br>'.'* Frais de livraison :'.$s->frais_de_port.'Dh<br>'.'* Date d\'achat  :'.$s->datec.'<br>';
     }?>
   <h4>

                   </pre>
                 </div>
                  <br><br>
                 <h2><a class='btn btn-primary btn-x text-uppercase' href="disconnect.php">Déconnection</a>  
                  <!-- <a class='btn btn-primary btn-x text-uppercase' href="Modifiercompte.php?action=Modifier">Modifier</a> --></h2>
                 
                      <!-- payment -->     <!--  -->
                         
                    <!-- /.row-->
                  </div>
                      <!-- fin  -->
                  </div>
                <!-- </form> -->
              </div>
              <!-- /.box-->
            </div>
            <br><br><br>
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