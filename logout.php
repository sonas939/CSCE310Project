<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["profile_id"]);
   unset($_SESSION["user_type"]);
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = index.php');
?>