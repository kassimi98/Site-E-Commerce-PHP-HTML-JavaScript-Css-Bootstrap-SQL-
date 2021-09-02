<?php
/**
 * 
 */

class paypal 
{   
  private $user="mohamedaminekassimi21-facilitator_api1.gmail.com";
  private $pwd="7KPVGGDHKZHWNDE4";
  private $signature="As-yXrNsU7GOmz2m5BH-OwmunLK4A0wGIg-2M5YaGbOEea3X9Dp5reir";
  public $endPoint="https://api-3t.sandbox.paypal.com/nvp";
  public $errors=array();
  

  
   public function __construct($user=false,$pwd=false,$signature=false,$prod=false)
  {
    if ($user) {
      $this->user=$user;
    }
    if ($pwd) {
      $this->pwd=$pwd;
    }
    if ($signature) {
      $this->signature=$signature;
    }
    if ($prod) {
      $this->endPoint=str_replace('sandbox.', '', $this->endPoint);
    } 
}
    public function request($method,$params) {
      

              $params=array_merge($params, array(
                'METHOD '=>$method,
                'VERSION '=> '204',
                'USER '=>$this->user,
                'PWD '=>$this->pwd,
                'SIGNATURE '=>$this->signature,
                 ));
                
                
// pour tester cURL s'il est installe dans mon serveur
  // if (in_array('openssl', get_loaded_extensions()))
  //   echo "openssl is installed on this server.\n";
  // else
  //   echo "openssl is not installed on this server.\n";
  
  // if (function_exists('curl_init'))
  //   echo "Function curl_init is available.\n";
  // else
  //   echo "Function curl_init is NOT available.\n";
              


       // print_r(get_loaded_extensions());


              $params=http_build_query($params);
              $curl=curl_init();

              curl_setopt_array($curl,array(
                CURLOPT_URL => $this->endPoint,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $params,
                CURLOPT_RETURNTRANSFER =>1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_VERBOSE => 1

               ));
              $response = curl_exec($curl);
              parse_str($response,$responseArray);

              if (curl_errno($curl)) {

                $this->errors= curl_error($curl);
                curl_close($curl);
                return false;

              }else {
                if ($responseArray['ACK']=='Success') {
                 curl_close($curl);
                return $responseArray;              
                  }else{

                    var_dump($responseArray);         
                $this->errors= curl_error($curl);
                curl_close($curl);
                return false;
              }
    }
    
  }

}


?>