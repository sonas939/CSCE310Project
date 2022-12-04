<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="order.php" class="navbar-brand">
            <h3 class="px-5">
            <i class="fa-solid fa-bread-slice"></i>  Build-A-Bread
            </h3>
        </a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="profile.php" class="nav-item nav-link active">
                    <h5 class="px-5 profile">Profile</h5>
                </a>
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }
                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>
