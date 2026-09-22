<?php
if(isset($_POST['submit'])) {
    if(!empty($_POST['cusid']) && !empty($_POST['username']) && !empty($_POST['telephone']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {
        // validate the values in the form

        // 1- connect to the database
        include('dbconnect.php');  

        // 2- get the data from the form and save it in array
        $data = [
            ':cusid' => $_POST['cusid'],
            ':name' => $_POST['username'],
            ':telephone' => $_POST['telephone'],
            ':email' => $_POST['email'],
            ':psw' => $_POST['password'],
            ':role' => $_POST['role'], // Add role to the data array
        ];

        // 3- write the insert query statement and save it in a variable
        $sql = "INSERT INTO customer(cusid, username, telephone, email, password, role) VALUES (:cusid, :name, :telephone, :email, :psw, :role)";

        // 4- prepare the query for execution 
        $stmt = $conn->prepare($sql);

        // 5- execute the query with the data saved in the array
        $stmt->execute($data);

        echo "<br><br>Record inserted successfully...<br> <br>"; 
        require('custview.php');
    } else {
        if(empty($_POST['cusid']))
            echo "<br>Fill the customer id ...<br>";
        if(empty($_POST['username']))
            echo "Fill the customer username ...<br>";
        if(empty($_POST['telephone']))
            echo "<br>Fill the customer telephone number ...<br>";
        if(empty($_POST['email']))
            echo "<br>Fill the customer email ...<br>";
        if(empty($_POST['password']))
            echo "<br>Fill the customer password ...<br>";
        if(empty($_POST['role']))
            echo "<br>Fill your role ...<br>";
        echo "<br><br><a href=signup.php>Go back to entry form</a>";
    }
}
?>
