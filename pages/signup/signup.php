<?php
include "../../php/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $contactnum = $_POST['contactnum'];

    if ($password != $confirmpassword) {
        echo "Sorry, passwords do not match.";
        exit;
    }

    $password = md5($password);

    $sql = "INSERT INTO users (name, email, password, phone_number )
		VALUES ('$name', '$email', '$password', '$contactnum')";

    $result = $dbcnx->query($sql);

    if (!$result)
	echo "Your query failed.";
    else
	echo '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sign up</title>
        <link rel="stylesheet" href="styles.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
      </head>
      <body>
        <!-- Header Section -->
        <nav id="header">
          <a href="../../index.html" class="logo"><img src="../../icon/Logo_nav.png" alt="Logo" /></a>
          <div>
            <ul id="navbar">
              <li><a href="../../index.html">Home</a></li>
              <li><a href="../../pages/about/about.html">About</a></li>
              <li><a href="../../php/menuredirect.php">Menu</a></li>
              <li><a href="../../pages/review/review.html">Review</a></li>
              <li><a href="../../pages/signin/signin.html">Sign in</a></li>
              <li>
                <a href=""><img src="../../icon/shopping-cart.png" alt="cart icon"></i></a>
              </li>
            </ul>
          </div>
        </nav>
        <section id="signupform">
            <h1>Sign up was successful</h1>
            <a href="../../pages/signin/signin.html">Sign in</a>
        </section>
        <footer id="footer">
            <div class="footerimg">
              <a href="../../index.html"><img src="../../img/logo.png" alt="little ramen logo"></a>
            </div>
            <div class="footernav1">
              <h4>Little Ramen</h4>
              <a href="../../pages/about/about.html">About</a>
              <a href="../../php/menuredirect.php">Menu</a>
              <a href="../../pages/review/review.html">Review</a>
              <a href="../../pages/signin/signin.html">Sign In</a>
            </div>
            <div class="footernav2">
              <h4>Contact Us:</h4>
              <p>
                +65 6123 4567
                <br />
                18 Raffles Quay , Singapore
                <br />
                littleramen@littleramen.com
              </p>
            </div>
            <div class="footernav3">
              <h4>Follow Us:</h4>
              <img src="../../icon/facebook.png" alt="facebook logo">
              <img src="../../icon/instagram.png" alt="instagram logo">
              <img src="../../icon/youtube.png" alt="youtube logo">
              <img src="../../icon/tiktok.png" alt="tiktok logo">
            </div>
        </footer>
     </body>
    </html>
    ';

    return;

}
?>
