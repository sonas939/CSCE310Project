<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>Build-A-Bread</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
      <h2>Welcome to Build-A-Bread</h2> 
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['create_account'])) {
               // redirect to create account
               header("Location: /create_account_front.php");
            }
            elseif (isset($_POST['edit_account'])) {
               // redirect to create account
               header("Location: /update_account_front.php");
            }         
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <!-- log in form START -->
         <form class = "form-signin" action="/login_back.php">
         <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
         <!-- <label for="username">username:</label> -->
         <input type="text" id="username" name="username" class = "form-control" placeholder = "Username:" Required><br>
         <!-- <label for="password">password:</label> -->
         <input type="password" id="password" name="password" class = "form-control" placeholder = "Password:" Required>
         <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
            
         </form>
         <!-- log in form END -->
      
         <!-- Edit and Create accounts: -->
         <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
         <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name = "create_account">Create Account</button> 
         <button class = "btn btn-lg btn-primary btn-block" type = "submit"
            name = "edit_account">Edit Account</button> 
         </form>

         <a href = "logout.php" tite = "Logout">Log Out</a>
         
      </div> 
      <img src="/loaf.png" width="280" height="125" title="lovely bread" alt="Loving bread" class="center"/>
      <img src="/breadBox.jpg" width="280" height="125" title="Nichijou Bread" alt="Nichijou Bread" class="center"/>
      <img src="/loaf.png" width="280" height="125" title="lovely bread" alt="Loving bread" class="center"/>
      <img src="/breadBox.jpg" width="280" height="125" title="Nichijou Bread" alt="Nichijou Bread" class="center"/>
      <img src="/loaf.png" width="280" height="125" title="lovely bread" alt="Loving bread" class="center"/>

   </body>
</html>