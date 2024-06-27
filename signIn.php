<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeniZ Online</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="home.css"> -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="Resources/iconup.ico" />
</head>


<body class="signIn_Body">
<div class="row signIn_Box" id="signInBox">
    <div class="col-sm-12 col-md-5 col-lg-5">
        <img src="resources/newfolder/logow.png" class="col-12" alt="logo">
        <div class="col-12 mt-5">Enter the details to create an account to shop online !</div>
        <div class="col-12 h4 mt-5">Already have an account?</div>
        <div class="col-12"><a href="#"><button class="col-12 align-items-center btn" onclick="changeView();" style="color:orangered;">Click here to login</button></a></div>
        <!-- <div class="mt-2">
                <button class="btn btn-outline-secondary col-12" >New to online store? Please Sign up</button>
        </div>                           -->
    </div>

    <!-- Sign In Box -->
    <div class="col-sm-12 col-md-7 col-lg-7">
        <h2 class="text-center mt-3">Sign In</h2>

        <?php

        $username = "";
        $password = "";

        if (isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }

        ?>

        <div class="mt-3">
            <label for="form-label">Username :</label>
            <input type="text" class="form-control" id="un" value="<?php echo $username ?>"/>
        </div>

        <div class="mt-2">
            <label for="form-label">Password :</label>
            <input type="password" class="form-control" id="pw" value="<?php echo $password ?>"/>
        </div>

        <div class="mt-2 mb-2">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label for="form-label">Remember Me</label>
        </div>

        <div class="col-12"><a href="forgetPassword.php"><button class="col-12 btn align-items-center text-end" style="color:orangered;"> Forgot Password?</button></a></div>

        <div class="d-none " id="msgDiv2">
            <div class="alert alert-danger" role="alert" id="msg2"></div>
        </div>
        <div class="mt-2">
            <button class="btn btn-secondary col-12" onclick="signIn();">Sign In</button>
        </div>
        
    </div>
    <!--sign in box--->
</div>



<div class="row signUp_Box d-none mt-3" id="signUpBox">

    <div class="col-lg-4 col-12 mt-3">
        <div class="row">
            <img src="resources/newfolder/logow.png" class="col-lg-12 col-4" alt="logo" height="70%">
            <div class="col-lg-12 col-8">
                <div class="col-12 mt-5 h5">Join the Fashion Revolution at FeniZ !</div>
                <div class="col-12 mt-2 p">Sign up now to unlock exclusive access to the latest trends, limited-edition collections, and personalized style recommendations.</div>
            </div>
        </div>
        <div class="col-lg-12 mt-3 h7">Shopped with us before? Log in with your details</div>
        <div class="col-lg-12 h4 mt-4">New Member?</div>
        <div class="col-12"><a href="#"><button class="col-12 align-items-center btn" style="color:orangered;" onclick="changeView();"> Click here to register </button></a></div>
    </div>
    <!-- Sign Up Box -->
    <div class="col-lg-8 col-12 mt-3">
        <h1 class="text-center">Sign Up</h1>

        <div class="row">

            <div class="mt-3 col-lg-6 col-12">
                <label for="form-label">First Name:</label>
                <input type="text" class="form-control" id="fname" />
            </div>

            <div class="mt-3 col-lg-6 col-12">
                <label for="form-label">Last Name:</label>
                <input type="text" class="form-control" id="lname" />
            </div>

        </div>

        <div class="mt-3">
            <label for="form-label">Email:</label>
            <input type="email" class="form-control" id="email" />
        </div>

        <div class="mt-3">
            <label for="form-label">Mobile:</label>
            <input type="text" class="form-control" id="mobile" />
        </div>

        <div class="mt-3">
            <label for="form-label">Username:</label>
            <input type="text" class="form-control" id="username" />
        </div>

        <div class="mt-3 mb-3">
            <label for="form-label">Password:</label>
            <input type="password" class="form-control" id="password" />
        </div>

        <div class="d-none" id="msgDiv1">
            <div class="alert alert-danger" id="msg1"></div>
        </div>

        <div class="mt-2">
            <button class="btn btn-secondary col-12" onclick="signUp();">Sign Up</button>
        </div>
        <div class="mt-2">
            <button class="btn btn-outline-secondary col-12" onclick="changeView();">Already have an account? Please Sign In</button>
        </div>

    </div>
    <!--sign up box--->

</div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>