<?php
session_start();

// Check if the user is already signed in
if (!isset($_SESSION['valid_user'])) {
    // If not logged in, redirect to signin.html
    header('Location: ../pages/signin/signin.html');
    exit;
}

// User is logged in at this point, now check the cart contents
if (empty($_SESSION['cart'])) {
    header("Location: ../pages/checkout/cart.php");
} else if (!empty($_SESSION['cart']) && $_SESSION['isCheckoutClicked']) {
    header("Location: ../pages/ordersummary/summary.php");
} else {
    header("Location: ../pages/checkout/cart.php");
}
exit;

?>

