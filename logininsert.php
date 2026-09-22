<?php
session_start();
include('dbconnect.php');

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL query with UNION to fetch data from both tables
    $sql = "(SELECT 'staff' AS role, username, password FROM staff WHERE username = ? AND password = ?)
            UNION
            (SELECT 'customer' AS role, username, password FROM customer WHERE username = ? AND password = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $password, $username, $password]);

    // Fetch the result
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = count($rows);

    if ($count > 0) {
        // Login successful, set session variables
        $_SESSION['username'] = $rows[0]['username'];
        $_SESSION['role'] = $rows[0]['role'];
        header("Location: loginview.php");
        exit();
    } else {
        // Invalid username or password
        echo "Invalid username/password";
        require("login.php");
        exit();
    }
} else {
    // Username or password not provided
    echo "Please fill all fields";
    require("login.php");
    exit();
}
?>
