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

<body onload="loadProduct(0);">


    <!-- nav bar -->
    
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand h1 mb-0" href="home.php">
                <img class="me-3" src="Resources/Img/logow.png" height="50" />
            </a>

            <button class="navbar-toggler" style="align-items: end;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                
            <span class="navbar-toggler-icon"></span>
            </button>


            <div class="d-flex justify-content-end">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">

                        <li class="nav-item nba me-5">
                            <a class="nav-link active" aria-current="page" href="index.php">All Products</a>
                        </li>

                        <li class="nav-item nbu me-5">
                            <a class="nav-link active" aria-current="page" href="profile.php">User Profile</a>
                        </li>

                        <li class="nav-item nbu me-5">
                            <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item nbh me-5">
                            <a class="nav-link active" aria-current="page" href="orderHistory.php">Orders</a>
                        </li>

                        <li class="nav-item nbc me-5">
                            <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
                        </li>

                        <li class="nav-item nbs">
                            <a class="nav-link active" aria-current="page" href="#" onclick="signOut();"> Sign Out</a> <!-- Corrected href -->
                        </li>


                    </ul>

                </div>

            </div>

        </div>
    </nav>
    

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Supar value deals</h2>
        <h1 style="color: orangered;">On all product</h1>
        <p style="color: white;">Save more with coupons & up to 70% off!</p>
        <button><a href="#" class="h2" style="color: yellow;">Shop Now</a> </button>
    </section>





<section id="banner" class="section-m1">
    <h4>Repair Service</h4>
    <h2>Up to <span>70% Off</span>- All T-Shirt & Accessries</h2>
    <button class="normal"><a href="#">Explore More</a></button>
</section>

<section id="product1" class="section-p1">
    <h2>New Arrivals</h2>
    <p>Summer Collection New Morden Design</p>
    <div class="pro-container">
       

        <div class="row col-10 offset-1" id="pid">



        </div>


    
    </div>
</section>

<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>Crazy deals</h4>
        <h2>Buy 1 get 1 free</h2>
        <span>The best classic dress is on sale at cara</span>
        <button class="white">Learn More</button>
    </div>
    <div class="banner-box banner-box2">
        <h4>Spring/summer</h4>
        <h2>Upcomming season</h2>
        <span>The best classic dress is on sale at cara</span>
        <button class="white">Collection</button>
    </div>
</section>

<section id="banner3">
    <div class="banner-box">
        <h2>SEASONAL SALE</h2>
        <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring / Summer 2023</h3>
        </div>
        <div class="banner-box banner-box3">
                <h2>T-SHIRTS</h2>
                <h3>New Trendy Prints</h3>
        </div>
</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Ip For Newsletters</h4>
        <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
    </div>
    <div class="form">
        <input type="text" placeholder="Your e-mail address">
        <button class="normal">Sign Up</button>
    </div>
</section>


<?php include "footer.php" ?>




<script src="bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>