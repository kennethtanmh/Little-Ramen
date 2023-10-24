<?php
session_start();

// Check if the user is already signed in
if (isset($_SESSION['valid_user'])) {
    // If logged in, redirect to signin.php
    header('Location: ../pages/signin/useraccount.php');
;
} else {
    // If not logged in, redirect to signin.html
    header('Location: ../pages/signin/signin.html');
}
exit;
?>
