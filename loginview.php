<?php
session_start();
include('dbconnect.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "User not logged in";
    exit();
}

// Retrieve username from session
$username = $_SESSION['username'];

// Check if user is a staff member
$sql_staff = "SELECT * FROM staff WHERE username = :username";
$stmt_staff = $conn->prepare($sql_staff);
$stmt_staff->bindParam(':username', $username);
$stmt_staff->execute();
$num_staff = $stmt_staff->rowCount();

// Check if user is a customer
$sql_customer = "SELECT * FROM customer WHERE username = :username";
$stmt_customer = $conn->prepare($sql_customer);
$stmt_customer->bindParam(':username', $username);
$stmt_customer->execute();
$num_customer = $stmt_customer->rowCount();

if ($num_staff > 0) {
    // User is a staff member
    header("Location: spage.php"); // Redirect to staff page
    exit();
} elseif ($num_customer > 0) {
    // User is a customer
    header("Location: travel.html"); // Redirect to customer page
    exit();
} else {
    // User not found in either table
    echo "Invalid user";
}

// Close the database connection (not necessary for PDO)
// $conn = null;
?>



