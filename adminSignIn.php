<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeniZ Online Admin</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="Resources/iconup.ico" />
    </head>

<body class="adminSignInBody">

    <div class="row adminSignIn_Box">
        <div class="col-lg-5 col-12">
            <img src="Resources/Img/logow.png" class="col-12" alt="logo">
            <div class="col-12 mt-3 h3">FeniZ Admin Hub </div>
            <div class="col-12 mt-3 p">Your Fashion Command Center! Effortlessly manage inventory, track orders, and curate collections. With FeniZ, you’re always in vogue behind the scenes.</div>
        </div>
        <div class="col-lg-7 col-12">
            <h2 class="text-center mt-5">Admin Login</h2>

            <div class="mt-4">
                <label for="form-label">Username</label>
                <input type="text" class="form-control border-black bg-transparent" placeholder=" Ex: Sahan" id="un"/>
            </div>

            <div class="mt-4 mb-3">
                <label for="form-label">Password</label>
                <input type="password" class="form-control border-black bg-transparent" placeholder=" Ex: *****" id="pw"/>
            </div>
            <div class="d-none" id="msgDiv">
                <div class="alert alert-danger" id="msg"></div>
            </div>

            <div class="mt-4">
                <button class="btn btn-secondary col-12" onclick="adminSignIn();">Sign In</button>
            </div>
        </div>
        

    </div>

    <script src="script.js"></script>

</body>

</html>