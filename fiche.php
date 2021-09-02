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
 
  <title>Fiche de commande</title>


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
        <?php 
      } 
      ?>
         <?php if (!isset($_SESSION['user_pseudo'])) {?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="register.php">S'Inscrir</a>
          </li>
        <?php 
      }else{
        ?>
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

<section id="payment">


<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
            
              
            </div>
            <div id="checkout" class="col-lg-12">
              <div class="box">
 
                 <h1 style="color: #d8dbd8">📜 la Fiche de Commande</h1>
                 <br><br>
                 <div>
                  <pre style="background-image: url('admin/images/bg3.jpg');">
                    <?php 
                    if ($_GET['action']='fich') {
                    $nom=$_SESSION['user_nom'];
                    $pseudo=$_SESSION['user_pseudo'];
                    $Adresse= $_SESSION['user_adresse'];
                    $Frais= CalculFraisPorts();
                    $total= MontantGlobalTva();
                    $date=date(" Y-m-d H:i:s");
                      ?>
<h3 style="color:#848e86 ">⚪ Client:   </h3><h4 style="color: "><br> ◾ <?php echo $nom;?> <h4> 
<h3 style="color:#848e86 ">⚪ Adresse de livraison:         </h3><h4 style="color: "><br> ◾  <?php echo $Adresse;?><h4>
<h3 style="color:#848e86 ">⚪ Produit(s):         </h3><h4 style="color: "><br><?php for ($i=0; $i < count($_SESSION['panier']['libelleProduit']) ; $i++){ echo ' ◾ '.$_SESSION['panier']['libelleProduit'][$i].' :'.$_SESSION['panier']['qteProduit'][$i].  'Unité(s)<br><br>';}?><h4>  
<h3 style="color:#848e86 ">⚪ Total:          </h3><h4 style="color: "><br> ◾ <?php echo $total;?>DH <h4>
<h3 style="color:#848e86 ">⚪ Frait de port:      </h3><h4 style="color: "><br> ◾ <?php echo $Frais;?>DH <h4> <h3 style="color:#848e86 ">⚪ Date d'achat:      </h3><h4 style="color: "><br> ◾ <?php echo $date;?> <h4>
<h3 style="color:#848e86 ">     🔘  Votre commande sera envoyé à votre adresse après au maximum 72 heures de votre demande en ligne.  🔘</h3><hr>
  <a class='btn btn-primary btn-x text-uppercase' href="?action=valider" onclick="validation()">Valider la commande</a>   <a class='btn btn-primary btn-x text-uppercase' href="panier.php" >Retour</a>
<?php
// if ($_GET['action']='annuler'){
// header("location:panier.php");

 if ($_GET['action']='valider') {
 
for ($i=0; $i <count($_SESSION['panier']['libelleProduit']) ; $i++){
   $produit=$_SESSION['panier']['libelleProduit'][$i];
  $quantite=$_SESSION['panier']['qteProduit'][$i]; 

$insert=$db->query("INSERT INTO commande VALUES  
  ('$nom','$Adresse','$Frais','$total','$produit','$pseudo','$quantite','$date')");

$select=$db->query("SELECT * FROM productsh WHERE titre='$produit' ");
$r=$select->fetch(PDO::FETCH_OBJ);
$stock=$r->stock;
$stock=$stock-$quantite;

$update=$db->query("UPDATE  productsh SET stock='$stock' WHERE titre='$produit' ");
 }?>
  <script type="text/javascript">
    function validation() {
      alert('Merci d\'avoir commander chez nous et a la prochaine.\n Nous allons vous livrer dans au maximum 72 heures');
    }
  </script>
    <?php

}else{
  echo "votre commande n'est pas été envoyer !";
}


 }

 ?>
            </pre>
                 </div>
                  <br><br>
                   

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