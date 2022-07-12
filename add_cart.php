<?php
require_once("methods.php");

$productID = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];
$product_quantity = $_POST["product_quantity"];
$product_image = $_POST['product_img'];
if (isset($_POST["add_cart_btn"])) {
    if (isset($_SESSION["cart"])) {

        $item_array_id = array_column($_SESSION["cart"], "product_id");

        if (!in_array($productID, $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $product_id,
                'product_quantity' => $product_quantity,
                'product_img' => $product_image,
            );
            $_SESSION["cart"][$count] = $item_array;
            if (isset($_SESSION["totals"]["totalQuantity"])) {
                $_SESSION["totals"]["totalQuantity"] += $product_quantity;
                $_SESSION["totals"]["totalPrice"] += ($product_quantity * $product_price);
            } else {
                $_SESSION["totals"]["totalQuantity"] = $product_quantity;
                $_SESSION["totals"]["totalPrice"] = ($product_quantity * $product_price);
            }

            echo "<script> alert('Success Adding to cart'); </script>";
            // echo $_SESSION["cart"];
            print_r($_SESSION["cart"]);
        } else {
            echo "<script> alert('Error Adding to cart'); </script>";
        }
    } else {
        //session_destroy();
        //setting cart variables
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
        print_r($_SESSION["cart"]);
    }
}
