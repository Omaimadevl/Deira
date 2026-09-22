<!DOCTYPE html>
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

    <form action="staffinsert.php" method="POST">
        <label for="staffId">Staff ID:</label>
        <input type="text"  name="staffid" required>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password"  name="password" required><br> <br>
		
		<label for="password">Gender: </label>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female<br> <br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text"  name="phonenum" placeholder="(xxx)xxxx-xxxx" required>
		
		<label for="role"><b>Role</b></label>
        <input type="text" placeholder="staff" name="role" required>

        <input type="submit" value="Submit" name="submit">
		<input type="reset" name="reset" value="Reset">
    </form>
</div>

</body>
</html>



