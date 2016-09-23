<?php
   session_start();

   setcookie("name","",time()-3600, '/'); 

   setcookie("signedin","",time()-3600, '/'); 

   setcookie("userid","",time()-3600, '/'); 

   setcookie("userlevel","",time()-3600, '/'); 


   unset($_SESSION["display_name"]);
   unset($_SESSION["user_id"]);
   unset($_SESSION["user_level"]);
   unset($_SESSION["signed_in"]);
   session_destroy();
   
   header('Refresh: 0.1; URL = /forum.php');
?>