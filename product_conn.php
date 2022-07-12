<?php
session_start();
require_once("methods.php");

$varProductName = $_POST['product_name'];
$varProductPrice = $_POST['product_price'];
$varProductQuantity = $_POST['product_quantity'];
$varProductGender = $_POST['product_gender'];

$fileName = $_FILES['product_image']['name'];


$update_res = add_product($varProductName, $varProductQuantity, $varProductPrice, $varProductGender, $fileName);

if ($update_res == true) {
    $file = $_FILES['product_image'];
    $fileType = $_FILES['product_image']['type'];
    $fileLocationTemp = $_FILES['product_image']['tmp_name'];

    $fileDest = 'images/';
    move_uploaded_file($fileLocationTemp, $fileDest . $fileName);
}
