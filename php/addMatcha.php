<?php
session_start();

// Initialize $userClaimedFreeMatcha from the session if available, or set it to false by default
$userClaimedFreeMatcha = isset($_SESSION['userClaimedFreeMatcha']) ? $_SESSION['userClaimedFreeMatcha'] : false;

if (!$userClaimedFreeMatcha) {
    $cartItem = array(
        'name' => 'Free Matcha',
        'price' => 0,
        'quantity' => 1
    );
    
    // Add the item to the cart array
    $_SESSION['cart'][] = $cartItem;
    
    // Update the user's session to indicate that they have claimed the free matcha
    $_SESSION['userClaimedFreeMatcha'] = true;
    
}

header('Location: ../pages/checkout/cart.php');
exit;
?>
