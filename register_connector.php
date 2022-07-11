<?php
session_start();
require_once("methods.php");

$varEmail = $_POST['user_email'];
$varUsername  = $_POST['user_name'];
$varPassword = $_POST['password_1'];

$varRoleId = 1;

$hashedPass = password_hash($varPassword, PASSWORD_DEFAULT);

//checks pasword similarity btn password & password 2
if (($_POST['password_1']) != ($_POST['password_2'])) {

    //error alert in the case there is a pwssword mismatch
    echo ("<script>
		window.location.href='login.php';
		alert('Password mismatch. Please try again');
		</script>");
} else {
    //checks if email is empty
    if (!empty($_POST['user_email'])) {

        //checks if password is empty
        if (!empty($_POST['password_1'])) {

            //checks whether there is an already registered email with the same creds.
            $sql = "SELECT * FROM tbl_users where user_email = '" . $varEmail . "'";
            $result = getData($sql);

            //if existing email, output an error message
            if (!empty($result)) {
                echo ("<script>
					window.location.href='login.php';
					alert('This email account already exists. Please login instead or register with another account.');
					</script>");
            } else {
                //insert the new user into the db
                $sql_insert2 = "INSERT INTO tbl_users(users_name,user_email,user_password,user_role) VALUES('" . $varUsername . "','" . $varEmail . "','" . $hashedPass . "','" . $varRoleId . "')";
                $res_insert = setData($sql_insert2);

                if ($res_insert = true) {
                    echo ("<script>
					window.location.href='landing.php';
					alert('Thank you for signing up.');
					</script>");

                    $sql2 = "SELECT * FROM tbl_users where user_email = '" . $varEmail . "'";
                    $result2 = getData($sql2);
                    $_SESSION['user_name'] = $result2['users_name'];
                    
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
