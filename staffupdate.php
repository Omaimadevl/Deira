<?php
if(isset($_GET['staffid']) && !isset($_POST['update']))

 {
	 include('dbconnect.php');
	 $staffid=$_GET['staffid'];
	 $sql="select staffid,username,password,gender,phonenum,role from staff where staffid='$staffid'";
	 $stmt=$conn->query($sql);
	 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
	 
	 foreach($rows as $row)
    {   
		$username = $row['username'];
		$password = $row['password'];
		$gender = $row['gender'];
		$phonenum = $row['phonenum'];
		$role = $row['role'];
        
    }
	
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: beige; 
            padding: 20px; 
        }
        .form-box {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        form {
            text-align: left;
        }
        input[type="text"],
        input[type="password"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
		input[type="reset"] {
            background-color:red;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
		input[type="reset"]:hover {
            background-color: red;
        }
    </style>
</head>
<body>
<div class="form-box">
    <h2>Staff Form</h2>

    <form action="" method="POST">
        <label for="staffId">Staff ID:</label>
        <input type="text"  name="staffid" readonly value="<?PHP if(!empty($staffid)) echo $staffid;?> ">

        <label for="username">Username:</label>
        <input type="text" name="username" required value="<?PHP if(!empty($username)) echo $username;?>">

        <label for="password">Password:</label>
        <input type="password"  name="password" required value="<?PHP if(!empty($password)) echo $password;?>"><br> <br>
		
		<label for="password">Gender: </label>
		<input type="radio" name="gender" value="Male" <?php if(isset($gender) && $gender=='Male') echo 'checked';?>>Male
		<input type="radio" name="gender" value="Female" <?php if(isset($gender) && $gender=='Female') echo 'checked';?>>Female<br> <br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text"  name="phonenum" placeholder="(xxx)xxxx-xxxx"  required value="<?PHP if(!empty($phonenum)) echo $phonenum;?>">
		
		<label for="role"><b>Role</b></label>
        <input type="text" placeholder="staff" name="role" required value="<?PHP if(!empty($role)) echo $role;?>">

        <input type="submit" name="update" value="UPDATE DATA">

    </form>
</div>

</body>
</html>



<?php
 }
elseif(isset($_POST['update'])&& !empty($_POST['staffid'] && $_POST['username'] && $_POST['password'] && $_POST['gender'] && $_POST['phonenum'] && $_POST['role']))
{
		// 1- connect to the database
		include('dbconnect.php');  
		//2- get the data from the form and save it in array
		$data = [
			
			':username' => $_POST['username'],
			':password' => $_POST['password'],
			':gender' => $_POST['gender'],
			':phonenum' => $_POST['phonenum'],
			':role' => $_POST['role'],
			

		];
		// 3- write the insert query statement and save it in a vriable
		$staffid= $_POST['staffid'];
		$sql ="update staff set username= :username,password= :password,gender= :gender,phonenum= :phonenum ,role=:role where staffid='$staffid'";
		// 4- prepare the query for excution 
		
		$stmt = $conn ->prepare($sql);
		
		// 5- excute the the query with the data saved in the array
		
		$stmt->execute($data);
				
		echo "<br><br>Record has been updated successfully...<br> <br>"; 
		require('staffview.php');
		
}
else
{
		if (empty($_POST['staffid'])) 
		echo "<br>Fill the staff id ...<br>";
		if (empty($_POST['username']))
		echo "Fill the user name ...<br>";
		if (empty($_POST['password'])) 
		echo "<br>Fill your password ...<br>";
		if (empty($_POST['phonenum'])) 
		echo "<br>Fill your phone Number ...<br>";
	    if(empty($_POST['role']))
        echo "<br>Fill your role ...<br>";
		require('staffview.php');

}

?>