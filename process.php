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


  $totaltva=MontantGlobalTva();
 $paypal=new paypal();

 $paypal->request('GetExpressCheckoutDetails',array('TOKEN' =>$_GET['token']));

 if ($response) {
 	if ($response['CHECKOUTSTATUS']=='PaymentActionCompleted') {
 		die('ce paiment a ete deja valide');
 		
 	}
 }else{
 	var_dump($paypal->errors);
 	die();
 }
   
   $paypal->request('DoExpressCheckoutPayment',array(
   	'TOKEN' =>$_GET['token'],
   	'PAYERID' =>$_GET['PayerID'],
     'PAYMANTACTION'=>'sale',
     'PAYMANTREQUEST_0_AMT' => $totaltva,
     'PAYMANTREQUEST_0_CURRENCYCODE' => 'DH' 
      ));

   if ($response) {
   var_dump($response);


   }else{

   	var_dump($paypal->errors);
 	die();

   }




?>