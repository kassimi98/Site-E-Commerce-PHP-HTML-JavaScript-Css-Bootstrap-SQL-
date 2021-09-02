

<?php

function creationPanier(){


  try{
 $db= new PDO('mysql:host=localhost;dbname=site-e-commerce','root','');
  $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
 echo "une erreur est survenue";    
 die(); }

  if (!isset($_SESSION['panier'])) {

    $_SESSION['panier']=array();
    $_SESSION['panier']['libelleProduit']=array();
    $_SESSION['panier']['qteProduit']=array();
    $_SESSION['panier']['prixProduit']=array();
    $_SESSION['panier']['verrou']=false;

    //    $select=$db->query("SELECT tva FROM productsh");
    //    $data=$select->fetch(PDO::FETCH_OBJ);
     // $_SESSION['panier']['tva']=$data->TVA;
  }
  return true;
}
      function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){
        if (creationPanier()&& !isVerouille()) {
          $positionProduit=array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
          
           if ($positionProduit !==false) {

            $_SESSION['panier']['qteProduit'][$positionProduit]+= $qteProduit;
   
               }else{
                array_push($_SESSION['panier']['libelleProduit'],$libelleProduit);
                array_push($_SESSION['panier']['qteProduit'],$qteProduit);
              array_push($_SESSION['panier']['prixProduit'],$prixProduit);
               }
        }else{
          echo "Erreur veuillez contacter administrateur ";
        }

      }
       function modifierQTeArticle($libelleProduit,$qteProduit){

        if (creationPanier()&& !isVerouille()){

          if ($qteProduit>0) {
            
       $positionProduit=array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);

          if ($positionProduit !==false) {

          $_SESSION['panier']['qteProduit'][$positionProduit]=$qteProduit;

          }

       }else{
        supprimerArticle($libelleProduit);
       }

      }else{
        echo "Erreur veuillez contacter administrateur ";
      }

    }

    function supprimerArticle ($libelleProduit) {

    if (creationPanier()&& !isVerouille()){
      $tmp=array();
      $tmp['libelleProduit']=array();
      $tmp['qteProduit']=array();
      $tmp['prixProduit']=array();
      $tmp['verrou']=$_SESSION['panier']['verrou'];

        

      for($i=0; $i <count($_SESSION['panier']['libelleProduit']) ; $i++)
       { 
        
        if ($_SESSION['panier']['libelleProduit'][$i]!==$libelleProduit)
         {
          
    array_push($tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
    array_push($tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
    array_push($tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
                         
        }
      }
        
        $_SESSION['panier']=$tmp;
        unset($tmp);


    }else{
            echo "Erreur veuillez contacter administrateur ";

      }

    }
        
        function MontantGlobal(){

          $total=0;

        for ($i=0; $i <count($_SESSION['panier']['libelleProduit']) ; $i++) {
          $total +=$_SESSION['panier']['qteProduit'][$i]*$_SESSION['panier']['prixProduit'][$i];
        } 

        return $total;

        }

        function MontantGlobalTva(){

          $total=0;

        for ($i=0; $i <count($_SESSION['panier']['libelleProduit']) ; $i++) {
          $total+=$_SESSION['panier']['qteProduit'][$i]*$_SESSION['panier']['prixProduit'][$i];
        } 

        return $total+$total*10/100;
          
        }

           function supprimerPanier(){

            
         unset($_SESSION['panier']);
            

           }


            function isVerouille(){

       if (isset($_SESSION['panier'])&& $_SESSION['panier']['verrou']) {
                
                return true;
              }else{
                return false;
              }

            }

            function compterArticles(){

              if (isset($_SESSION['panier'])) {
                
                return count($_SESSION['panier']['libelleProduit']);
              
              }else{
                
                    return 0;
              }
            }
            function CalculFraisPorts(){
              try{
 $db= new PDO('mysql:host=localhost;dbname=site-e-commerce','root','');
  $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
 echo "une erreur est survenue";    
 die(); }
              
              $weight_products=0;
              $shipping=0;

              for ($i=0; $i <compterArticles() ; $i++) { 
                for ($j=0; $j < $_SESSION['panier']['qteProduit'][$i] ; $j++) { 
                  
                       $titre=$_SESSION['panier']['libelleProduit'][$i];
                       $select=$db->query("SELECT weight FROM productsh WHERE titre='$titre'");
                       $result=$select->fetch(PDO::FETCH_OBJ);
                       $weight=$result->weight;
                        
                        $weight_products+=$weight;
                  
                      
                    
                     
                    }

                }  
                 $select=$db->query("SELECT * FROM weights WHERE weight>='$weight_products'");
                    $result2=$select->fetch(PDO::FETCH_OBJ);

                    $shipping=$result2->shipping;
                        
                  
                    return $shipping;


            }


      ?>
