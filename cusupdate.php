<?php
if(isset($_GET['cusid']) && !isset($_POST['update']))

 {
	 include('dbconnect.php');
	 $cusid=$_GET['cusid'];
	 $sql="select username,telephone,email,password,role from customer where cusid='$cusid'";
	 $stmt=$conn->query($sql);
	 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
	 
	 foreach($rows as $row)
    {
        $username = $row['username'];
        $telephone = $row['telephone'];
        $email = $row['email'];
		$password = $row['password'];
		$role = $row['role'];
    }
	
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  
  
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-image: url("imgg/pic3.jpg");
  background-repeat: no-repeat;
  background-size: cover;
 
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}



</style>
</head>
<body>
<form action="" method="POST">
  <div class="container">
    <h1 style="font-family: Times New Roman; font-style: italic; color:white;">Register</h1>
    <p style=" font-style: italic; color:red;">Please fill in this form to create an account.</p>
    <hr>
	
	<label for="cust_id"><b>CustomerId</b></label>
    <input type="text" placeholder="Enter Your id" name="cusid" readonly value="<?PHP if(!empty($cusid)) echo $cusid;?> ">
	
	<label for="username">Username:</label>
    <input type="text" placeholder="Enter Your Name" name="username" required value="<?PHP if(!empty($username)) echo $username;?>">
	
	<label for="telephone"><b>Telephone</b></label>
	<input type="text" placeholder="(xxx)xxxx-xxxx" name="telephone" required value="<?PHP if(!empty($telephone)) echo $telephone;?>">

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required value="<?PHP if(!empty($email)) echo $email;?>">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required value="<?PHP if(!empty($password)) echo $password;?>">
	
	<label for="role"><b>Role</b></label>
    <input type="text" placeholder="customer" name="role" required value="<?PHP if(!empty($role)) echo $role;?>">
  
	
    <hr>
    
    <p>
<input type="submit" name="update" value="UPDATE DATA">
</p>
  </div>
</form>

</body>
</html>


<?php
 }
elseif(isset($_POST['update'])&& !empty($_POST['cusid'] && $_POST['username'] && $_POST['telephone'] && $_POST['email'] && $_POST['password'] && $_POST['role']  ))
{
		// 1- connect to the database
		include('dbconnect.php');  
		//2- get the data from the form and save it in array
		$data = [
			
			':username' => $_POST['username'],
			':telephone' => $_POST['telephone'],
			':email' => $_POST['email'],
			':password' => $_POST['password'],
			':role'=> $_POST['role']

		];
		// 3- write the insert query statement and save it in a vriable
		$cusid= $_POST['cusid'];
		$sql ="update customer set username= :username,telephone= :telephone,email= :email,password= :password, role=:role where cusid='$cusid'";
		// 4- prepare the query for excution 
		
		$stmt = $conn ->prepare($sql);
		
		// 5- excute the the query with the data saved in the array
		
		$stmt->execute($data);
				
		echo "<br><br>Record has been updated successfully..."; 
		require('custview.php');

		
}
else
{
		if (empty($_POST['cusid'])) 
		echo "<br>Fill the customer id ...<br>";
		if (empty($_POST['username']))
		echo "Fill the user name ...<br>";
		if (empty($_POST['telephone'])) 
		echo "<br>Fill the phone number ...<br>";
		if (empty($_POST['email'])) 
		echo "<br>Fill your email ...<br>";
		if (empty($_POST['password'])) 
		echo "<br>Fill your password ...<br>";
	    if(empty($_POST['role']))
        echo "<br>Fill your role ...<br>";
		require('custview.php');

}

?>