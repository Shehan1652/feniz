<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeniZ Online</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="Resources/iconup.ico" />
</head>

<body class="signIn_Body">


    <div class="signIn_Box" id="signInBox">

        <h2 class="text-center">Forget Password</h2>

        <div class="mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="e">
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert" id="msg"></div>
        </div>
        <div class="mt-2">
            <button class="btn btn-secondary col-12" onclick="forgetPassword();">Send Email</button>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
