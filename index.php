<?php
   ob_start();
   session_start();
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
         
         h1{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <!-- Written by Nathanael Goza -->
   <body>
      <h1>Welcome to Build-A-Bread</h1> 
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['create_account'])) {               // redirect to create account when button is pressed
               header("Location: /create_account_front.php");
            }    
         ?>
      </div> 
      
      <div class = "container">
      
         <!-- log in form START -->
         <form class = "form-signin" action="/login_back.php">
         <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
         <input type="text" id="username" name="username" class = "form-control" placeholder = "Username:" Required><br>
         <input type="password" id="password" name="password" class = "form-control" placeholder = "Password:" Required>
         <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>            
         </form>
         <!-- log in form END -->
      
         <!-- Create accounts Button -->
         <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
         <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name = "create_account">Create Account</button>
         </form>

         <!-- Log Out Link -->
         <a href = "logout.php" tite = "Logout">Log Out</a>
         
      </div> 
      <!-- Images to make the website pretty -->
      <img src="/loaf.png" width="280" height="125" title="lovely bread" alt="Loving bread" class="center"/>
      <img src="/breadBox.jpg" width="280" height="125" title="Nichijou Bread" alt="Nichijou Bread" class="center"/>
      <img src="/loaf.png" width="280" height="125" title="lovely bread" alt="Loving bread" class="center"/>
      <img src="/breadBox.jpg" width="280" height="125" title="Nichijou Bread" alt="Nichijou Bread" class="center"/>
      <img src="/loaf.png" width="280" height="125" title="lovely bread" alt="Loving bread" class="center"/>
   </body>
   <!-- End code from Nathanael Goza -->
</html>