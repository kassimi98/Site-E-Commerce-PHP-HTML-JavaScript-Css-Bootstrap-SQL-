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
 
  <title>DESCRIPTION DU PRODUIT</title>


  <!-- Custom fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles  -->
  <link href="css/pagency.min.css" rel="stylesheet">

</head>
<body  id="page-top">
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
            <a class="nav-link js-scroll-trigger" href="register.php">S'Inscrir</a>
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
  <!-- <div><br><br><br><br><br><br><br></div> -->

<!-- Modal  -->
   <?php
   if (isset($_GET['show'])) {

   $product=$_GET['show'];   
   $price=$_GET['p'];
   $descri=$_GET['d'];
   $cate=$_GET['c'];
   $genre=$_GET['g'];
   $stock=$_GET['st'];
  
   ?>  
   <section>
              <div class='container'>
             <div class='row'>
                          
             <div class='col-lg-12' >
             <div class='modal-body'>
             <div class='col-md-6' >
      <img class='img-fluid d-block mx-auto' height="70%"  width="100%" src='admin/images/<?php echo $product;?>.jpg'>
     <br>
             <div align="center">
            <?php 
            // $select=$db->prepare("SELECT stock FROM productsh ");
            // $select->execute(array());       
            // $s=$select->fetch(PDO::FETCH_OBJ);

    if ($stock > 0) {
      ?>
          
  <a align='center' class='btn btn-primary btn-xl text-uppercase' href='panier.php?action=ajout&amp;
  l=<?php echo  $product;?>&amp;q=1&amp;p=<?php echo  $price ;?>'>Ajouter Au Panier 🛒</a>
        <?php }else{
          
          echo"<h6 class='btn btn-primary btn-xl text-uppercase ' >stock épuisé !</h6>";
        }  ?>
        </div>
          
        </div> 
           <div class='col-md-6'>
            <?php 
            echo "<h1 align='center' class='text-uppercase' style='color:#f5f5f5'>".$product."</h1>";?>
            <!--  <p class='item-intro text-muted' style="color:#f5f5f5">Lorem ipsum dolor sit amet consectetur.</p> -->
             <p class='item-intro text-muted' style="color:#f5f5f5">Prix: <?php echo "<a style='color:#f5f5f5'>".$price.".00 DH</a>"; ?>
             <?php
             if ($stock > 0) {
              ?>
              <p class='item-intro text-muted' style="color:#f5f5f5">stock: <?php echo "<a style='color:#f5f5f5'>".$stock.".unité(s).</a>"; ?>
               <?php
             }else{

             }
             ?>
         <p class='item-intro text-muted' style="color:#f5f5f5">Categorie: <?php echo "<a style='color:#f5f5f5'>".$cate."</a>"; ?>
           
         </p>
             <p class='item-intro text-muted' style="color:#f5f5f5">Description:</p>
             <?php echo "<p style='color:#f5f5f5'>".$descri."</p>"; ?>
             
             <p style="color:#f5f5f5" class='item-intro text-muted' >Genre:  <?php echo "<a style='color:#f5f5f5'>".$genre."</a>"; ?>  
             </p>      
                        
            </div>           
            </div> 
            </div> 
            </div> 
            </div>            
         </section>
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


  <?php }?>
