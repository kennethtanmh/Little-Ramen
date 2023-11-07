<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../../php/dbconnect.php";
session_start();

// Check if the 'valid_user' session variable is not set
if (!isset($_SESSION['valid_user'])) {
    // Redirect the user to the sign-in page
    header("Location: ../../pages/signin/signin.html");
    exit; // Ensure that no further code is executed
}

// Check if orderNumber has already been assigned
if (!isset($_SESSION['orderNumber']) && (!empty($_SESSION['cart']))) {
  // Order Number Logic, unique 3-digit order number
  $_SESSION['orderNumber'] = rand(100, 999);
}

$orderNumber = $_SESSION['orderNumber'];

// Check if collectionTime has already been assigned
if (!isset($_SESSION['collectionTime']) && (!empty($_SESSION['cart']))) {
  // Get Estimated Time Logic
  date_default_timezone_set('Asia/Singapore');
  $currentTimestamp = time();
  $randomMinutes = rand(20,50);
  $collectionTimestamp = $currentTimestamp + ($randomMinutes * 60);
  $_SESSION['collectionTime'] = date("h:i A", $collectionTimestamp);
}

$collectionTime = $_SESSION['collectionTime'];

$_SESSION['isCheckoutClicked'] = true;

$email = $_SESSION['valid_user'];

// db code to push to orders table
// Check if the order has not been added to the database yet
if (!isset($_SESSION['orderAdded'])) {
  // Loop through the $_SESSION['cart'] array and insert items into the database
  foreach ($_SESSION['cart'] as $index => $cartItem) {
    $itemName = $cartItem['name'];
    $quantity = $cartItem['quantity'];

    // Create SQL query
    $sql = "INSERT INTO orders (email, item, quantity, orderNum) 
            VALUES ('$email', '$itemName', '$quantity', '$orderNumber')";

    // Execute SQL query
    if (!$dbcnx->query($sql)) {
      // Handle error - this will halt the loop and script
      die("Database query failed: " . $dbcnx->error);
    }
  }

  // After successfully inserting all items in the cart
  $_SESSION['orderAdded'] = true;

  // Close the database connection
  $dbcnx->close();
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <nav id="header">
    <a href="../../index.html" class="logo"><img src="../../icon/Logo_nav.png" alt="Logo" /></a>
    <div>
      <ul id="navbar">
        <li><a href="../../index.html">Home</a></li>
        <li><a href="../../pages/about/about.html">About</a></li>
        <li><a href="../../php/menuredirect.php">Menu</a></li>
        <li><a href="../../pages/review/review.html">Review</a></li>
        <li><a href="../../php/redirect.php" >Sign in</a></li>
        <li>
          <a href=""><img src="../../icon/shopping-cart.png" alt="cart icon" ></i></a>
        </li>
      </ul>
    </div>
  </nav>

    <div class="content-box">
      <div class="welcomeMessage">
          <p>Welcome <?php echo $_SESSION['user_name']; ?> !</p>
          <p>Your order is being processed.</p>
          <p>Order Summary:</p>
      </div>
      <div class="orderSummary">
          <table>
              <?php
                  foreach ($_SESSION['cart'] as $cartItem) {
                      $itemName = $cartItem['name'];
                      $quantity = $cartItem['quantity'];
                      echo "<tr>";
                      echo "<td>$itemName </td>";
                      echo "<td>X $quantity</td>";
                      echo "</tr>";
                  }
              ?>
          </table>
      </div>
      <div class="orderInfo">
        <p>Your Order Number is: </p>
        <p><?php echo $orderNumber; ?></p>
        <p>Estimated Collection Time</p>
        <p><?php echo $collectionTime; ?></p>
      </div>
      <div class="orderReceivedBtn">
        <form action="./orderReceived.php" method="post">
        <button type="submit" name="received" value="true">Order Received!</button>
        </form>
      </div>
    </div>

    <footer id="footer">
        <div class="footerimg">
          <a href="../../index.html"><img src="../../img/logo.png" alt="little ramen logo"></a>
        </div>
        <div class="footernav1">
          <h4>Little Ramen</h4>
          <a href="../../pages/about/about.html">About</a>
          <a href="../../php/menuredirect.php">Menu</a>
          <a href="../../pages/review/review.html">Review</a>
          <a href="../../php/redirect.php">Sign In</a>
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