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
</head>
<body>
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
    <a href="preorder.php">Continue Shopping</a>
    <a href="checkout.php">Checkout</a>
</body>
</html>
