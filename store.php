<?php

$session = session_start();
// session_destroy();
require_once("methods.php");

if (isset($_POST["add_cart_btn"])) {
    if (isset($_SESSION["cart"])) {
        $productID = $_POST["product_id"];
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_quantity = $_POST["product_quantity"];
        $product_image = $_POST['product_img'];
        $item_array_id = array_column($_SESSION["cart"], "product_id");

        if (!in_array($productID, $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $productID,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,
                'product_img' => $product_image,
            );
            $_SESSION["cart"][$count] = $item_array;
            if (isset($_SESSION["totals"]["totalQuantity"])) {
                $_SESSION["totals"]["totalQuantity"] += $product_quantity;
                $_SESSION["totals"]["totalPrice"] += $product_quantity * $product_price;
            } else {
                $_SESSION["totals"]["totalQuantity"] = $product_quantity;
                $_SESSION["totals"]["totalPrice"] = $product_quantity * $product_price;
            }

            echo "<script> alert('Success Adding to cart'); </script>";
            // echo $_SESSION["cart"];
            // print_r($_SESSION["totals"]);
        } else {

            echo "<script> alert('Item already in cart'); </script>";
        }
    } else {
        //session_destroy();
        //setting cart variables
        $productID = $_POST["product_id"];
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_quantity = $_POST["product_quantity"];
        $product_image = $_POST['product_img'];

        $item_array = array(
            'product_id' => $productID,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_quantity' => $product_quantity,
            'product_img' => $product_image,
        );

        $_SESSION["cart"][0] = $item_array;

        if (isset($_SESSION["totals"]["totalQuantity"])) {
            $_SESSION["totals"]["totalQuantity"] += $product_quantity;
            $_SESSION["totals"]["totalPrice"] += ($product_quantity * $product_price);
        } else {
            $_SESSION["totals"]["totalQuantity"] = $product_quantity;
            $_SESSION["totals"]["totalPrice"] = ($product_quantity * $product_price);
        }

        echo "<script> alert('Success Adding to cart'); </script>";
        // echo $_SESSION["cart"];
        // print_r($_SESSION["cart"]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("components/header.php"); ?>
</head>

<body>
    <?php require_once("methods.php"); ?>
    <?php include("components/navbar.php"); ?>
    <div class="store">
        <div class="py-4 w-100 head">
            <h2>SANDYSTORE</h2>
        </div>
        <div class="category-links">
            <ul>
                <li><button class="category-btn-active" id="b-1">All</button> </li>
                <li><button class="category-btn" id="b-2">Mens</button> </li>
                <li><button class="category-btn" id="b-3">Women</button> </li>
                <li><button class="category-btn" id="b-4">Kids</button> </li>
            </ul>
            <span class="line"></span>
        </div>
        <div class="card-display">
            <?php
            $sql_Select = "SELECT * FROM tbl_products;"; //Obtaining all products
            $data = getDat2($sql_Select);

            if ($data != 0) {
                for ($i = 0; $i < count($data); $i++) {
                    $product_id = $data[$i]["product_id"];
                    $product_name = $data[$i]["product_name"];
                    $product_price = $data[$i]["product_price"];
                    $product_image = $data[$i]["product_image"];
            ?>
                    <form class="item-card" action="store.php" method="POST">
                        <div class="img-sect">
                            <img src="images/<?php echo $product_image; ?>" alt="">
                        </div>
                        <div class="item-details">
                            <span class="cost">$ <?php echo $product_price; ?></span>
                            <p><?php echo $product_name; ?></p>
                            <div class="count">
                                <button id="add">+</button>
                                <input class="cat_id" name="product_id" value="<?php echo $product_id; ?> ">
                                <input id="value" value="1" name="product_quantity" style="width:2vw; font-size:2.5vh; align-items:center;">
                                <input class="cat_id" name="product_price" value="<?php echo $product_price; ?> ">
                                <input class="cat_id" name="product_name" value="<?php echo $product_name; ?> ">
                                <input class="cat_id" name="product_img" value="<?php echo $product_image; ?> ">

                                <button id="minus">-</button>
                            </div>
                            <button type="submit" name="add_cart_btn" class="add-2-cart" id="<?php $product_id; ?>">
                                Add To Cart
                            </button>
                        </div>
                    </form>
            <?php
                }
            } else {
                echo "No products found";
            }
            ?>

        </div>

    </div>
    <?php include("components/footer.php"); ?>
    <script>
        var b1 = document.getElementById("b-1");
        var b2 = document.getElementById("b-2");
        var b3 = document.getElementById("b-3");
        var b4 = document.getElementById("b-4");
        var add = document.getElementById("add");
        var minus = document.getElementById("minus");
        var items = document.getElementById("value");
        var valueprod = document.getElementById("value").innerHTML;
        var product_amount = parseInt(valueprod);
        b1.addEventListener('click', function() {
            b1.className = "category-btn-active"
            b2.className = "category-btn"
            b3.className = "category-btn"
            b4.className = "category-btn"

        })
        b2.addEventListener('click', function() {
            b2.className = "category-btn-active"
            b1.className = "category-btn"
            b3.className = "category-btn"
            b4.className = "category-btn"

        })
        b3.addEventListener('click', function() {
            b3.className = "category-btn-active"
            b2.className = "category-btn"
            b1.className = "category-btn"
            b4.className = "category-btn"

        })
        b4.addEventListener('click', function() {
            b4.className = "category-btn-active"
            b2.className = "category-btn"
            b3.className = "category-btn"
            b1.className = "category-btn"

        })

        function add_qty() {
            product_amount++;
            items.innerHTML = product_amount;
        }

        function sub_qty() {
            if (product_amount > 1) {
                product_amount--;
                items.innerHTML = product_amount;
            }

        }
        var open_mod = document.getElementById("pane");

        function close_log() {
            open_mod.style.display = "none";
        }

        function open_log() {
            open_mod.style.display = "inline-flex";
        }
    </script>
</body>

</html>