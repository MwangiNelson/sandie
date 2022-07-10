<?php
function connect()
{
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "sandybest";
    $link = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname) or die("Could not connect" . mysqli_connect_error());
    return ($link);
}

function verifyUser($varEmail, $varPassword)
{
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "sandybest";
    $dbport = "3306";
    $conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname, $dbport);

    $sql = "SELECT * FROM tbl_user where email = '" . $varEmail . "'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) != 0) {
        while ($res = mysqli_fetch_array($result)) {
            $hashedPass = $res['user_password'];
            $verify = password_verify($varPassword, $hashedPass);
            if ($verify) {
                //assigning a variable to the value of the role id as retrieved from the database
                $varRoleID = $res['user_role'];

                //assigning session variables values to be used when tracking user activities in-app
                $_SESSION['userRoleID'] = $res['user_role']; //assigning role id
                $_SESSION['userID'] = $res['user_id']; //assigning username

                //checking the user role to direct them to their designated page 
                $sql2 = "SELECT * FROM tbl_roles where role_id = '" . $varRoleID . "'";
                $result2 = $conn->query($sql2);


                if (mysqli_num_rows($result2) != 0) {
                    while ($res2 = mysqli_fetch_array($result2)) {
                        //sets logged in as true ie 1
                        // $_SESSION['userLog'] = '1';

                        //if the user role is '1' thats a user_CLIENT atapelekwa home page
                        if ($res2['role_name'] == 'User_CLIENT') {
                            $_SESSION['user_name'] = $res['user_name'];
                            echo ("<script>
									window.location.href='landing.php';
									alert('Login Successful.');
									</script>");
                        } elseif ($res2['role_name'] == 'User_ADMIN') {
                            echo ("<script>
									alert('Admin Module still in construction');
									</script>");
                        }
                    }
                } else {
                    echo "<script>
							alert('User role not set!');
                            window.location.href='login.php'
							</script>";
                }
            } else {
                echo '<script>
					alert("Invalid Password. Please try again");
					window.location.href = "login.php";
					</script>';
            }
        }
    } else {
        echo '<script>
			alert("Invalid email. Please try again.");
			window.location.href = "login.php";
			</script>';
    }
}
function getData($sql)
{
    $link = connect();
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $rows = $row;
        return $rows;
    }
}
function setData($sql)
{
    $link = connect();
    if (mysqli_query($link, $sql)) {
        return true;
    } else {
        echo ("<script>
			alert('Error '" . mysqli_error($link) . ");
			</script>");
        return false;
    }
}
