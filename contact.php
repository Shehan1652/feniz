
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
<body>
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
                            <a class="nav-link active" aria-current="page" href="profile.php" >User Profile</a>
                        </li>

                        <li class="nav-item nbu me-5">
                            <a class="nav-link active" aria-current="page" href="contact.php" style="color: white;">Contact</a>
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
    <br>
    <br>
    <br>

    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, WE Love to hear from you!</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p><strong>Address:</strong> 57/B Orugoda waththa, Colombo</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p><strong>Phone:</strong> +(94) 76 6940 120</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                        <p>feniz@gmail.com</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                        <p>Satuday to Thrusday: 9.00am to 16.pm</p>
                </li>
            </div>
        </div>
        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44813.40609666269!2d79.81056675343522!3d6.892646294724759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd8f6bc0e3f%3A0xebb846a35afbf4f4!2sJava%20Institute%20For%20Advanced%20Technology!5e0!3m2!1sen!2slk!4v1716624238924!5m2!1sen!2slk" 
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="form-details">
        <form>
            <span>LEAVE A MESSAGE</span>
            <h2>We love too hear from you</h2>
            <input type="text" placeholder="Your Name" id="un">
            <input type="text" placeholder="E-mail" id="em">
            <input type="text" placeholder="Subject" id="sb">
            <textarea id="umsg" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal" onclick="rmsg();">Submit</button>
        </form>
        <div class="people">
            <div>
                <img src="people/1.png" alt="">
                <p><span>Joen Doe </span>Senior Marketing Manager <br> Phone: +(94) 76 409 00 65 <br>Email:joen@gmail.com</p>
            </div>
            <div>
                <img src="people/2.png" alt="">
                <p><span>William Smith </span>Senior Marketing Manager <br> Phone: +(94) 77 224 89 33 <br>Email:william@gmail.com</p>
            </div>
            <div>
                <img src="people/3.png" alt="">
                <p><span>Emma Stone</span>Senior Marketing Manager <br> Phone: +(94) 71 909 55 86 <br>Email:emma@gmail.com</p>
            </div>
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


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
