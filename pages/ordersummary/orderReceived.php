<?php 
session_start();

// Check if the 'valid_user' session variable is not set
if (!isset($_SESSION['valid_user'])) {
  // Redirect the user to the sign-in page
  header("Location: ../../pages/signin/signin.html");
  exit; // Ensure that no further code is executed
}

if (isset($_POST['received']) && $_POST['received'] == true) {
  // If user hits orderReceived Button unset all the sesssion var related to the user orders
  unset($_SESSION['orderNumber']);
  unset($_SESSION['collectionTime']);
  unset($_SESSION['cart']);
}

// Redirect back to the order summary page
header('Location: ../../pages/ordersummary/summary.php');
exit;
?>