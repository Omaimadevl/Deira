
<!DOCTYPE html>
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
<form action="custinsert.php" method="POST">
  <div class="container">
    <h1 style="font-family: Times New Roman; font-style: italic; color:white;">Register</h1>
    <p style=" font-style: italic; color:red;">Please fill in this form to create an account.</p>
    <hr>
	
	<label for="cust_id"><b>CustomerId</b></label>
    <input type="text" placeholder="Enter Your id" name="cusid" required>
	
	<label for="username">Username:</label>
    <input type="text" placeholder="Enter Your Name" name="username" required>
	
	<label for="telephone"><b>Telephone</b></label>
	<input type="text" placeholder="(xxx)xxxx-xxxx" name="telephone" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>
	
	<label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password-repeat" id="psw-repeat" required>
	
	<label for="role"><b>Role</b></label>
    <input type="text" placeholder="customer" name="role" required>
  
  
	
    <hr>
    
    <input type="submit" value="Register" name="submit">
	<input type="reset" name="reset" value="Reset">
  </div>
</form>




</body>
</html>
