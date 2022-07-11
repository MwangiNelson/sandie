<?php
include('../PHP/phpMethods.php');
session_start();
unset($_SESSION['user_name']);
unset($_SESSION['user_id']);

session_destroy();

$_SESSION['user_log'] = '0';
echo ("<script>
      alert('Successfully logged out.');
      </script>");
header("location:landing.php");
