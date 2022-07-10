<?php
$session = session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("components/header.php"); ?>
</head>

<body>

    <!-- the navbar at the tops -->
    <?php include("components/navbar.php"); ?>
    <div class="first-section p-4">
        <div class="left p-4 w-50">
            <h1>Find Your Favorite Clothing collection</h1>
            <p>Going to a concert? Date night? Camping? Name it... we have you covered</p>
        </div>
        <div class="right w-50">
            <div class="landing-display">
                <img src="images/wardrobe.png" alt="">
                <h4>All You Can Wear</h4>
                <hr>
                <p class="description">
                    Finest quality clothes for all seasons and occassions
                </p>
            </div>
            <a href="store.php" class="link-btn"><button class="store-btn my-4">Visit Store<i class="fa-solid fa-arrow-right px-3"></i></button></a>


        </div>
    </div>
    <div class="reasons-div">
        <div class="reason">
            <img src="images/voucher.png" alt="">
            <h3>GET AMAZING DISCOUNTS</h3>
        </div>
        <div class="reason">
            <img src="images/quality.png" alt="">
            <h3>PREMIUM QUALITY</h3>
        </div>
        <div class="reason">
            <img src="images/delivery.png" alt="">
            <h3>FAST AND FREE SHIPPING</h3>
        </div>

    </div>
    <div class="category-display-section">
        <div class="category">
            <div class="category-image">
                <img src="images/sp1.png" alt="">
            </div>
            <div class="category-details">
                <h3>Men</h3>
                <h4>Collections</h4>
                <p>200+ products</p>
                <a href="store.php"> <button class="btn btn-text-primary">View Collection <i class="fa-solid fa-angles-right px-2"></i></button></a>
            </div>
        </div>
        <div class="category">
            <div class="category-image">
                <img src="images/sp2.png" alt="">
            </div>
            <div class="category-details">
                <h3>Women</h3>
                <h4>Collections</h4>
                <p>1000+ products</p>
                <a href="store.php"> <button class="btn btn-text-primary">View Collection <i class="fa-solid fa-angles-right px-2"></i></button></a>
            </div>
        </div>
        <div class="category">
            <div class="category-image">
                <img src="images/sp3.png" alt="">
            </div>
            <div class="category-details">
                <h3>Kids</h3>
                <h4>Collections</h4>
                <p>800+ products</p>
                <a href="store.php"><button class="btn btn-text">View Collection <i class="fa-solid fa-angles-right px-2"></i></button></a>
            </div>
        </div>
    </div>
    <?php include("components/footer.php"); ?>

    <script src="js/main.js"></script>
</body>

</html>