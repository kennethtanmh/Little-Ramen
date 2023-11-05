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
    // If the cart is empty, redirect to the cart page
    header("Location: ../pages/checkout/cart.php");
} else {
    // If the cart is not empty, redirect to the summary page
    header("Location: ../pages/ordersummary/summary.php");
}
exit;
?>

