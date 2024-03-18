<?php
include "../backend/dbConnect.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <title>TE login page</title>

    <!-- <link rel="stylesheet" type="text/css" href="main.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../internals/style/loginregister.css">

    <?php
    include '../include/jquery.php';
    include '../include/toastNotification.php';
    ?>


</head>

<body>
<div class="main">
    <div class="container a-container" id="a-container">
        <form class="form" id="register-form" method="post">
            <h2 class="form_title title">Create Account</h2>
            <div class="form__icons">
                <img class="form__icon" id="google-signup"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/1024px-Google_%22G%22_logo.svg.png">
                <img class="form__icon" id="facebook-signup"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Facebook_Logo_2023.png/480px-Facebook_Logo_2023.png">
            </div>
            <span class="form__span">or use email for registration</span>
            <input class="form__input" type="text" id="register-name" placeholder="Name" required>
            <input class="form__input" type="email" id="register-email" placeholder="Email" required>
            <input class="form__input" type="password" id="register-password" placeholder="Password" required>
            <button name="submit" type="submit" class="form__button button submit" id="signup-button">SIGN UP</button>
        </form>
    </div>
    <div class="container b-container" id="b-container">
        <form class="form" id="b-form" method="" action="">
            <h2 class="form_title title">Sign in to Website</h2>
            <div class="form__icons">
                <img class="form__icon" id="google-signin"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/1024px-Google_%22G%22_logo.svg.png">
                <img class="form__icon" id="facebook-signin"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Facebook_Logo_2023.png/480px-Facebook_Logo_2023.png">

            </div>
            <span class="form__span">or use your email account</span>
            <input class="form__input" type="text" id="login-email" placeholder="Email">
            <input class="form__input" type="password" id="login-password" placeholder="Password">
            <a class="form__link">Forgot your password?</a>
            <button class="form__button button submit" id="login-button">SIGN IN</button>
        </form>
    </div>
    <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
            <h2 class="switch__title title">Welcome Back !</h2>
            <p class="switch__description description">To keep connected with us please login with your personal
                info</p>
            <button class="switch__button button switch-btn">SIGN IN</button>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
            <h2 class="switch__title title">Hello Friend !</h2>
            <p class="switch__description description">Enter your personal details and start journey with us</p>
            <button class="switch__button button switch-btn">SIGN UP</button>
        </div>
    </div>
</div>
<!-- <script src="main.js"></script> -->
</body>

</html>
<!-- partial -->
<!--<script src="./script.js"></script>-->
<script src="../internals/script/frontend/loginSignup.js"></script>
<!--<script src="./socialLogin.js" type="module"></script>-->
<script src="../internals/script/loginSignup.js" type="module"></script>

</body>
</html>