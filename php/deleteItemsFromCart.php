<?php
session_start();

// Check if the item_index is set in the POST data
if (isset($_POST['item_index'])) {
    $itemIndex = $_POST['item_index'];

    // Check if the item_index is a valid index in the cart array
    if (isset($_SESSION['cart'][$itemIndex])) {
        // Remove the item from the cart by unsetting it
        unset($_SESSION['cart'][$itemIndex]);
        
        // Reset array keys to maintain continuity (optional)
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Redirect back to the page where the cart is displayed
header('Location: ../pages/checkout/cart.php');
exit();
