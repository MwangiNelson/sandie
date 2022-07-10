<?php
session_start();
require_once("methods.php");

$varEmail = $_POST['user_email'];
$varUsername = $_POST['user_name'];
$varPassword = $_POST['password_1'];

$varRoleId = '1';

$hashedPass = password_hash($varPassword, PASSWORD_DEFAULT);

if (($_POST['password_1']) != ($_POST['password_2'])) {
    echo ("<script>
		window.location.href='login.php';
		alert('Password mismatch. Please try again');
		</script>");
} else {
    if (!empty($_POST['user_email'])) {
        if (!empty($_POST['password_1'])) {
            $sql = "SELECT * FROM tbl_users where user_email = '" . $varEmail . "'";
            $result = getData($sql);
            if (!empty($result)) {
                echo ("<script>
					window.location.href='login.php';
					alert('This email account already exists. Please login instead or register with another account.');
					</script>");
            } else {
                /*$sql_insert1 = "INSERT INTO tbl_role(roleName) VALUES('$varRoleName')";
				setData($sql_insert1);*/

                $sql_insert2 = "INSERT INTO tbl_users('users_name','user_email','user_password','user_role') VALUES($varUsername,$varEmail,$hashedPass,$varRoleID)";
                $res_insert = setData($sql_insert2);

                if ($res_insert = true) {
                    echo ("<script>
					window.location.href='landing.php';
					alert('Thank you for signing up.');
					</script>");
                } else {
                    echo ("<script>
					window.location.href='login.php';
					alert('An error occured while signing up.');
					</script>");
                }
            }
        }
    } else {
        echo ("<script>
				window.location.href='login.php';
				alert('Please check your info and try again.');
				</script>");
    }
}
