<?php
session_start();

// Check if the 'valid_user' session variable is not set
if (!isset($_SESSION['valid_user'])) {
    // Redirect the user to the sign-in page
    header("Location: ../../pages/signin/signin.html");
    exit; // Ensure that no further code is executed
}

// check if orderNumber has already been assigned
if (!isset($_SESSION['orderNumber'])) {
  // Order Number Logic, unqiue 3-digit order number
  $_SESSION['orderNumber'] = rand(100, 999);
}

$orderNumber = $_SESSION['orderNumber'];

// check if collectionTime has already been assigned
if (!isset($_SESSION['collectionTime'])) {
  // Get Estimated Time Logic
  date_default_timezone_set('Asia/Singapore');
  $currentTimestamp = time();
  $randomMinutes = rand(20,50);
  $collectionTimestamp =$currentTimestamp + ($randomMinutes * 60);
  $_SESSION['collectionTime'] = date("h:i A", $collectionTimestamp);
}

$collectionTime = $_SESSION['collectionTime'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <p>Welcome  <?php echo $_SESSION['user_name']; ?> !</p>
    <p>Your order is being processed.</p>
  </div>
  <div>
    <p>Order Summary:</p>
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
  </div>
  <p>Your Order Number is: </p>
  <p><?php echo $orderNumber; ?></p>
  <p>Estimated Collection Time</p>
  <p><?php echo $collectionTime; ?></p>
  <form action="./orderReceived.php" method="post">
    <button type="submit" name="received" value="true">Order Received!</button>
  </form>
  
</body>
</html>