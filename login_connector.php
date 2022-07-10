<?php
session_start();
require_once("methods.php");

$varEmail = $_POST['email'];
$varPassword = $_POST['password'];

verifyUser($varEmail,$varPassword);

 ?>
