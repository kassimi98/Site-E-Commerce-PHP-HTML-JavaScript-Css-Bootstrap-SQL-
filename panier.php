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
 // require_once('paypal.php');
?>
<!DOCTYPE >
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panier 🛒</title>
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
    <body  id="panier">
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
            <a class="nav-link js-scroll-trigger" href="#panier"><?php echo compterArticles();?>🛒</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.php">Assistance</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- <header class="header mb-5"> -->
      
    <!-- </header> -->
    <br><br><br><br><br><br><br><br><br><br><br>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
             
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="panier.php"><h6 style="color:#424039">🛒Panier</h6></a></li>
                  <li aria-current="page" class="breadcrumb-item active">Carte D'achat(s) </li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12" >
              <div class="box" >
                <?php
                 
                 $erreur=false;

  $action=(isset($_POST['action'])?$_POST['action']:(isset($_GET['action'])?$_GET['action']:null));
if ($action!= null) {

  if (!in_array($action, array('ajout','suppression','refresh'))) 
    
      $erreur=true;
  $l=(isset($_POST['l'])?$_POST['l']:(isset($_GET['l'])?$_GET['l']:null));
  $q=(isset($_POST['q'])?$_POST['q']:(isset($_GET['q'])?$_GET['q']:null));
  $p=(isset($_POST['p'])?$_POST['p']:(isset($_GET['p'])?$_GET['p']:null));

$l=preg_replace('#\v#', '', $l);
$p=floatval($p);
if (is_array($q)) {
  $QteArticle=array();
  $i=0;
  foreach ($q as $contenu) {
     $QteArticle[$i++]=intval($contenu);
        }
    }else{

      $q=intval($q);
  }
}
                if (!$erreur) { 

                  switch ($action) {
                      case 'ajout':
                      ajouterArticle($l,$q,$p);
                      break;
                      case 'suppression':
                      supprimerArticle($l);
                      break;
                      case 'refresh':
                      if ($QteArticle) {
                        
            for ($i=0; $i <count($QteArticle) ; $i++) { 
                       
        modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i], round($QteArticle[$i]));

                      } }else{
                        echo "Panier vide !!";
                      }

                      break;
                    
                    default:
                     
                      break;
                  }
                  
                 } 
                ?>
                <form  method="post" action="" >
                  <h1 >Carte D'achat(s)</h1>
                   <a href="?deletepanier=true">Vider le Panier</a>
                  <p class="text-muted" >Vous avez <?php echo compterArticles();?> type(s) de produit(s) dans votre Panier.</p>
                  <?php
                   if (isset($_GET['deletepanier']) && $_GET['deletepanier']==true) {
                    
                         supprimerPanier();
                       }
                    if (creationPanier()) {

                       $nbProduits=count($_SESSION['panier']['libelleProduit']);

                       if ($nbProduits<=0) {
                        
                        echo "<h4 align='center' style='color:#5d2f0d' >Oops Panier vide !</h4>";
                       }
                        else{?>

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th >Produit</th>
                          <th >TVA</th>
                          <th >Quantité</th>
                          <th >Prix Unitaire</th>                         
                          <th >P.u*Qte</th>
                          <th >Retirer</th>
                           
                        </tr>
                        
                     </thead>
                      <?php               
      //                   $total=MontantGlobal();
      //                   $totaltva=MontantGlobalTva();
      //                   $shipping=CalculFraisPorts();
      //                   $paypal= new paypal();

      //       $params=array(
      //                     'RETURNURL' =>'http://127.0.0.1/monsite/process.php' ,
      //                     'CANCELURL' =>'http://127.0.0.1/monsite/cancel.php' ,
      //                     'PAYMANTREQUEST_0_AMT' => $totaltva+$shipping,
      //                     'PAYMANTREQUEST_0_CURRENCYCODE' => 'USD',
      //                     'PAYMANTREQUEST_0_SHIPPINGAMT' =>$shipping,
      //                     'PAYMANTREQUEST_0_ITEMAMT' => $totaltva

      //                       );

      //       $response=$paypal->request('setExpressCheckout',$params);

      //       if ($response) {
      // $paypal='https://sandbox.paypal.com/webscr?cmd=_express-Checkout&useraction=commit&token='.$response['TOKEN'].'';
      //       }else{

      //         var_dump($paypal->errors);
      //         die('Erreur'); }     
                        for ($i=0; $i < $nbProduits ; $i++) { 
                      ?>
                      <tbody>

                      
                        <tr>
  <td ><a href="#"><img width="20%" height="30%" src="admin/images/<?php echo $_SESSION['panier']['libelleProduit'][$i];?>.jpg"> </a><h4 align="center"> <?php echo $_SESSION['panier']['libelleProduit'][$i];?></h4></td>

                          <td><?php echo '10 %';?></td>                         
<td><input name="q[]" value="<?php echo $_SESSION['panier']['qteProduit'][$i];?>" size='2'></td>
                          
<td ><?php echo $_SESSION['panier']['prixProduit'][$i].' DH';?></td>
<td >
<?php echo $_SESSION['panier']['prixProduit'][$i]*$_SESSION['panier']['qteProduit'][$i].'DH' ;?>
  
</td>
<td>
<a href="panier.php?action=suppression&amp;l=<?php echo rawurlencode($_SESSION['panier']['libelleProduit'][$i]);?>">✖</a></td>
                          <!-- <i class="fab fa-trash-o"></i> -->
                        </tr>
                      </tbody>
                       <?php
                        $nomp = $_SESSION['panier']['libelleProduit'][$i];
                     }                    
                  
                    ?>
                      <tfoot>
                        <tr>
                          <th colspan="5" >Total</th>
                          <th colspan="2" ><?php echo MontantGlobal() .' DH';?></th>
                        </tr>
                       <tr>
                          <th colspan="5" >Frais de Ports</th>
            <th colspan="2" ><?php echo CalculFraisPorts().' DH';?> </th>
                        </tr> 
                        <tr>
                          <th colspan="5" >Total avec TVA</th>
                          <th colspan="2" ><?php echo MontantGlobalTva().' DH';?></th>
                        </tr>            
                  </tfoot>
                   
                  </table>
             </div>
                 
<!-- /.table-responsive-->
 
                   <div align="center">
                    <?php 
if (isset($_SESSION['user_pseudo'])) {
  
?>
  <h2 align="center"><i class="fa fa-money "></i> Choisissez votre Methode de paiement</h2>
  <hr align="center"><br>  
           <!--method paypal  -->
          <!--  id="paypalbutton" -->
                      <div class="col-lg-4" >
                      <p>Payer directement vos achats par PayPal </p>
              <a class="btn btn-outline-secondary" href="">
                <img width="25%" height="10%" src="img/paypal.png"></a> 
              <p><font  color='#bb4b4b'>N'est pas disponible pour le moment !</font></p>            
                          </div>   
                          <div class="col-lg-4" > 
                            <p>Payer vos achats après la livraison </p>
                    <a class="btn btn-outline-secondary" href="fiche.php?action=fich&amp;<?php echo $nomp;?>"><img width="20%" height="10%" src="img/livraison.png"></a></div>
                    
                          <div class="col-lg-4" >
                            <p>Payer vos achats par cartes Banquaire </p>
                           <a class="btn btn-outline-secondary" href="">
                            <img width="25%" height="10%" src="img/MasterCard.png"></a>
                        <p><font  color='#bb4b4b'>N'est pas disponible pour le moment !</font></p>
                          </div>
                        </div> 
                 <!-- <div> -->
                 <?php }else {
                  echo "<h2>Vous devez être <a href='connect.php'>connecter</a> d'abord pour payer vos achats.</h2>";
                 }
                 ?>
                    
                 <!-- </div> -->
                 <!--  -->
                 <div  class="box-footer d-flex justify-content-between flex-column flex-lg-row">
   <div  class="left"><a href="hommeex.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continuer achat</a>
                    
                     <input type="hidden" name="action" value="refresh">              
              <!-- <i class="fa fa-chevron-right"></i>-->
               <!-- <input class="btn btn-outline-secondary" type="submit" value="Refraichir" > -->
        <button class="btn btn-primary " href="" align='right'><i class="fa fa-refresh"></i> Refraichir </button>
       
                    </div>
                 <!--  </div> -->
                 <br><br><br><br>
                 <?php
                                         
                       } 
                  
                 }
                
                    ?>
                </form>
                </div>
              </div>
                  </div>
                  <br>
              <div class="row same-height-row">
                <div class="col-lg-3 col-md-4">

                  <div class="box same-height">
                    <h3 >Peut être vous aimez aussi ces produits.</h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-4">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="hommeex.php"><img src="img/chaussure.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="hommeex.php"><img src="img/chaussure.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div>
                    <a href="hommeex.php" class="invisible"><img src="img/chaussure.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>chaussure</h3>
                      <p class="price">600 DH</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-4">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="hommeex.php"><img src="img/tshirt.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="hommeex.php"><img src="img/tshirt.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="hommeex.php" class="invisible"><img src="img/tshirt.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>T-shirt</h3>
                      <p class="price">150 DH</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-4">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="hommeex.php"><img src="img/viste.png" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="hommeex.php"><img src="img/viste.png" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="hommeex.php" class="invisible"><img src="img/viste.png" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Veste Jean</h3>
                      <p class="price">250 DH</p>
                    </div>
                  </div>
                  <!-- /.product---->
                </div>
              </div>
            </div>
           
            </div>
            <!-- /.col-md-3-->
          </div>
          </div>
          </div>
          </div>
          <!-- payment -->
         
          
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


  <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<script>paypal.Buttons().render('#paypalbutton');</script>

<script
    src="https://www.paypal.com/sdk/js?client-id=SB_CLIENT_ID">
  </script>

  
  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
  </body>
</html>


<!-- <?php

 // print_r(get_loaded_extensions());

?>  -->