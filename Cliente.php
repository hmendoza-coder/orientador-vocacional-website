<?php
session_start();
function callAPI($method, $url, $data){
   $curl = curl_init();


   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
      case "DELETE":
      case "PATCH":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'APIKEY: 111111111111111111111',
      'Content-Type: application/json',
	   $_SESSION['token'] ? 'Authorization : Bearer ' . $_SESSION['token'] : 'Authorization : Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6InNpYWMiLCJyb2xlIjoiMSIsInByaW1hcnlzaWQiOiI1MSIsIm5iZiI6MTU4Mzk2NTk2NiwiZXhwIjoxNTg0NTcwNzY2LCJpYXQiOjE1ODM5NjU5NjYsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6NTE2NyIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6NTE2NyJ9.4E9WTGCPPwcouV3r5J8cN8D5ONqiPLJfjDJGrFyJD18',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Fallo de Conexion");}
   curl_close($curl);
   return $result;

}
?>