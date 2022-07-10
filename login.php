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
        <nav class="auth-nav">
            <div class="logo-container">
                <a href="landing.php"> <img src="images/SandyBEST_logo.png" alt=""> </a>
            </div>
        </nav>
        <div class="sign-in" id="sign-in">
            <div class="checkout-head py-3">
                <h2>Sign In</h2>
            </div>
            <span class="line2"></span>
            <form class="sign-in-form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary w-100 my-4">Submit</button>
            </form>
            <span class="line2"></span>
            <div class="toggle-options py-2">
                <p>Don't have an account? <button class="btn btn-text mx-2" id="su-tg-btn">Sign Up Here</button> </p>
                <a href="landing.php"><button class="btn btn-text">Resume Shopping</button></a>
            </div>
        </div>
        <div class="sign-up" id="sign-up">
            <div class="checkout-head py-3">
                <h2>Sign Up</h2>
            </div>
            <span class="line2"></span>
            <form class="sign-in-form">
                <div class="form-group">
                    <label for="user_name">Username</label>
                    <input type="text" class="form-control" id="user_name" aria-describedby="emailHelp" placeholder="Enter username">
                    <small id="emailHelp" class="form-text text-muted">This name will appear on your profile</small>
                </div>
                <div class="form-group">
                    <label for="user_email">Email address</label>
                    <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="c_password">Confirm Password</label>
                    <input type="password" class="form-control" id="c_password" placeholder="Confirm Password">
                </div>

                <button type="submit" class="btn btn-primary w-100 my-4">Submit</button>
            </form>
            <span class="line2"></span>
            <div class="toggle-options py-2">
                <p>Already have an account? <button class="btn btn-text mx-2" id="si-tg-btn">Sign In Here</button> </p>
                <a href="landing.php"><button class="btn btn-text">Resume Shopping</button></a>
            </div>
        </div>
    </div>
    <?php include("components/footer.php"); ?>

    <script>
        var signup = document.getElementById("sign-up");
        var signin = document.getElementById("sign-in");
        var su_togglebtn = document.getElementById("su-tg-btn");
        var si_togglebtn = document.getElementById("si-tg-btn");


        su_togglebtn.addEventListener("click", function() {
            signin.style.display = "none";
            signup.style.display = "inline-flex";
        })
        si_togglebtn.addEventListener("click", function() {
            signup.style.display = "none";
            signin.style.display = "inline-flex";
        })
    </script>
</body>

</html>