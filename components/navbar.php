<nav class="navbar">

    <!-- app logo -->
    <div class="logo-container">
        <a href="landing.php"> <img src="images/SandyBEST_logo.png" alt=""> </a>

    </div>

    <!-- navbar options    -->
    <div class="navbar-options w-50">
        <ul>
            <li><a href="landing.php"><button class="btn btn-light cart-btn"><i class="fa-solid fa-house-chimney px-2"></i>HOME</button></a></li>
            <li><a href="store.php"><button class="btn btn-light cart-btn"><i class="fa-solid fa-store px-2"></i>STORE</button></a></li>
            <li><a href="cart.php"><button class="btn btn-light cart-btn"><i class="fa-solid fa-cart-shopping px-2"></i>Cart</button></a></li>
            <li><?php
                if (!isset($_SESSION['user_name'])) {
                    echo "<a href='login.php'><button class='btn btn-primary'><i class='fa-solid fa-arrow-right-to-bracket px-1'></i>SIGN IN</button></a>";
                } else {
                    echo "<a href'login.php'><button class='btn btn-primary' onclick='open_log()' id='show_mod'><i class='fa-solid fa-address-card px-1'></i> " . $_SESSION['user_name'] . "</button></a>";
                }
                ?></li>
        </ul>
    </div>
    <div class="logout" id="pane">
        <button class="btn btn-primary w-50 mx-1" id="close_mod" onclick="close_log()">Cancel</button>
        <a href="logout.php" class="w-50"><button class="btn btn-danger w-100 mx-1">Log Out</button></a>
    </div>
</nav>