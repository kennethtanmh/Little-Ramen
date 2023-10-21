<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
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
          <li><a href="../../pages/preorder/preorder.html">Menu</a></li>
          <li><a href="../../pages/review/review.html">Review</a></li>
          <li><a href="signin.html" class="active">Sign in</a></li>
          <li>
            <a href=""><img src="../../icon/shopping-cart.png" alt="cart icon"></i></a>
          </li>
        </ul>
      </div>
    </nav>
    <section id="account">
        <!-- can remove card with white icon -->
        <div class="card">
            <div class="user-info">
                <img src="../../img/user1.png" alt="User Icon" class="user-icon">
                <h2>Welcome back, User!</h2>
                <p>Email:  <?php if (isset($_SESSION['valid_user'])) echo $_SESSION['valid_user']; ?></p>
                <p>Phone: 123-456-7890</p>
                <h3>Promotion Codes</h3>
            </div>
            <div class="promo-section">
                <div class="promo-card">
                    <h3>Free Matcha: matcha23 </h3>
                    <a href="../../pages/preorder/preorder.html"><button class="promo-button">Use</button></a>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="footerimg">
          <a href="../../index.html"><img src="../../img/logo.png" alt="little ramen logo"></a>
        </div>
        <div class="footernav1">
          <h4>Little Ramen</h4>
          <a href="../../pages/about/about.html">About</a>
          <a href="../../pages/preorder/preorder.html">Menu</a>
          <a href="../../pages/review/review.html">Review</a>
          <a href="signin.html">Sign In</a>
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
