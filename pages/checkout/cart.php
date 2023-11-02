<?php
session_start();

// Check if the 'valid_user' session variable is not set
if (!isset($_SESSION['valid_user'])) {
    // Redirect the user to the sign-in page
    header("Location: ../../pages/signin/signin.html");
    exit; // Ensure that no further code is executed
}

// Check if the 'cart' session variable exists; if not, initialize it as an empty array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css"/>
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
          <li><a href="../../php/redirect.php" class="active">Sign in</a></li>
          <li>
            <a href=""><img src="../../icon/shopping-cart.png" alt="cart icon"></i></a>
          </li>
        </ul>
      </div>
    </nav>

    <div>
        <h1>Shopping Cart</h1>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php
            $totalPrice = 0;
            foreach ($_SESSION['cart'] as $cartItem) {
                $itemName = $cartItem['name'];
                $itemPrice = $cartItem['price'];
                $quantity = $cartItem['quantity'];
                $totalItemPrice = $itemPrice * $quantity;
                $totalPrice += $totalItemPrice;
                echo "<tr>";
                echo "<td>$itemName</td>";
                echo "<td>$itemPrice</td>";
                echo "<td>$quantity</td>";
                echo "<td>$totalItemPrice</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td colspan="3">Total:</td>
                <td><?php echo "$totalPrice"; ?></td>
            </tr>
        </table>
        <a href="../preorder/preorder.php">Continue Shopping</a>
        <a href="../ordersummary/summary.php">Pay</a>
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
