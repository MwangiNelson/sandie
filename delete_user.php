<?php
session_start();
require_once("methods.php");

$userId = $_POST['user_id'];


$deletion = deleteUser($userId);
if ($deletion = true) {
    echo " <script>
    window.location.href ='admin.php';
    alert('Successful User Elimination');
    </script>
    ";
} else {
    echo " <script>
    window.location.href ='admin.php';
    alert('Failed user elimination!');
    </script>
    ";
}
