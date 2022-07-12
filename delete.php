<?php
session_start();
require_once("methods.php");

$productId = $_POST['product_id'];


$deletion = deleteData($productId);
if ($deletion = true) {
    echo " <script>
    window.location.href ='admin.php';
    alert('Successful Deletion');
    </script>
    ";
} else {
    echo " <script>
    window.location.href ='admin.php';
    alert('Failed Deletion!');
    </script>
    ";
}
