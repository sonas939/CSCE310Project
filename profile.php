<title>Profile</title>

<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>

<body>
    <?php
        session_start();
        
        include 'connection.php';
         
        if (isset($_SESSION["profile_id"]) && isset($_SESSION["user_type"])) {
            if ($_SESSION["user_type"] == 3) {
                header("Location: admin.php");
            }
        } else {
            header("Location: index.php");
        }
        $profile_id = $_SESSION["profile_id"];
        require_once("header.php");
        $sql = "SELECT * FROM `profiles` USE INDEX (index_profile_id) WHERE profile_id = \"$profile_id\";";
        $results = $conn->query($sql)->fetch_assoc();
        $input_fname = $results['first_name'];
        $input_lname = $results['last_name'];
        $input_uname = $results['username'];
        $input_pwd = $results['password'];
        $input_email = $results['email'];
        $input_phonenum = $results['phone_number'];

        if (isset($_POST['edit_account'])) {
            // redirect to create account
            header("Location: /update_account_front.php");
        }         
    ?>

    <!-- Written by Nathanael Goza -->
    <div style="width: 100%;">
        <div style="width: 50%; height: 100%; float: left; border-style: solid; border-width: 2px; text-align: center"> 
            <h1>Profile</h1>
            <?php echo "<h2>User Name: $input_uname</h2>"; ?>
            <h2>Password: <?php echo $input_pwd; ?> </h2>
            <h2>Name: <?php echo $input_fname; ?> <?php echo $input_lname; ?> </h2>
            <h2>Email: <?php echo $input_email; ?> </h2>
            <h2>Phone Number: <?php echo $input_phonenum; ?> </h2>
            <!-- Edit and Create accounts: -->
            <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "edit_account">Edit Account</button> 
            </form>
            <a href = "logout.php" title = "Logout">Log Out</a>
        </div>
        <div style="margin-left: 50%; height: 100%; border-style: solid; border-width: 2px; text-align: center"> 
            <br>
            <a href=order.php>Order Now</a>
            <br><br>
            <a href=schedule.php>Schedule</a>
            <br><br>
            <hr style="margin-left: 0px">
            <h1>Order History</h1>
            <a href=order_view.php>View Past Orders</a>
        </div>
        
    </div>

</body>
</html>