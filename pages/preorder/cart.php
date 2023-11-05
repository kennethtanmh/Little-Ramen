<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

function format_price($price) {
    if (is_numeric($price)) {
        return number_format((float)$price, 2, '.', ',');
    }
    return '0.00';
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty! <a href='preorder.html'>Continue Shopping</a>";
} else {
    echo "<h1>Your Shopping Cart</h1>";
    echo "<ul>";
    $total = 0;
    foreach ($_SESSION['cart'] as $productId => $product) {
        $price = isset($product['price']) ? (float)$product['price'] : 0;
        $quantity = isset($product['quantity']) ? (int)$product['quantity'] : 0;
        $subtotal = $price * $quantity;
        $total += $subtotal;
        $productName = isset($product['name']) ? htmlspecialchars($product['name']) : 'Unknown Product';
        echo "<li>";
        echo "$productName - \$" . format_price($price) . " x $quantity = \$" . format_price($subtotal);
        echo " <a href='remove_from_cart.php?product_id=$productId'>Remove</a>";
        echo "</li>";
    }
    echo "</ul>";
    echo "<p>Total: \$" . format_price($total) . "</p>";
    echo "<form action='process_order.php' method='post'>";
    echo "<button type='submit'>Checkout</button>";
    echo "</form>";
    echo "<p><a href='preorder.html'>Continue Shopping</a></p>";
}
?>