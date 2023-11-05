<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['shio']; // Corrected to match the name attribute in the form
    $productPrice = $_POST['shio-price']; // Corrected to match the name attribute in the form
    $quantity = $_POST['quantity'];

    // You should fetch product details from the database using the product ID
    // Here's an example based on the provided data
    $product = array(
        'id' => $productId,
        'name' => 'Shio Ramen', // You should fetch this from the database
        'price' => $productPrice,
        'quantity' => $quantity
    );

    // Check if the product is already in the cart
    if (array_key_exists($productId, $_SESSION['cart'])) {
        // Increase quantity if already in cart
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        // Add to cart if not already in cart
        $_SESSION['cart'][$productId] = $product;
    }

    header('Location: cart.php');
    exit();
}
?>
