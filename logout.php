<?php
   // Written by Nathanael Goza
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["profile_id"]);
   unset($_SESSION["user_type"]);
   unset($_SESSION["editor_id"]);
   
   
   session_unset();  //unsets all session variables

   echo 'You have cleaned session';
   header('Refresh: 2; URL = index.php');  //returns to log in page
?>