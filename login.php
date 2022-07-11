<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("components/header.php"); ?>
    <style>
        .auth-body {
            background: url("images/clothes.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            width: 100%;
            height: 100vh;
            display: inline-flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="auth-body">
        <?php include("components/navbar_sp.php"); ?>
        <div class="sign-in" id="sign-in">
            <div class="checkout-head py-3">
                <h2>Sign In</h2>
            </div>
            <span class="line2"></span>
            <form class="sign-in-form" action="login_connector.php" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="user_email">Email address</label>
                    <input type="email" class="form-control" id="user_email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" class="form-control" id="user_password" name="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary w-100 my-4">Submit</button>
            </form>
            <span class="line2"></span>
            <div class="toggle-options py-2">
                <p>Don't have an account? <a href="sign_up.php"><button class="btn btn-text mx-2">Sign Up Here</button></a> </p>
                <a href="landing.php"><button class="btn btn-text">Resume Shopping</button></a>
            </div>
        </div>

    </div>
    <?php include("components/footer.php"); ?>

</body>

</html>