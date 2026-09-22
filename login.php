<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("imgg/e.PNG");
  background-repeat: no-repeat;
  background-size: cover;
  
}
 
* {
  box-sizing: border-box;
}

/* Style the container */
.container {
  position: relative;
  max-width: 1200px; /* Set a maximum width for larger screens */
  margin: 5% auto;
  border-radius: 20px; /* Softer border radius */
  background-color: rgba(245, 245, 220, 0.9); /* Lighter, semi-transparent beige */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Add a shadow for depth */
  padding: 40px;
}

/* Style inputs and link buttons */
input,
.btn {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 20px; /* Softer border radius for inputs and buttons */
  margin: 10px 0;
  font-size: 18px;
  line-height: 24px;
  text-decoration: none;
  opacity: 0.85;
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* Style the submit button */
input[type=submit] {
  background-color: #8B4513; /* Dark brown */
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #A0522D; /* Lighter shade of brown on hover */
}

/* Style for the "About Us" and "Contact Us" buttons */
.button-container {
  display: flex;
  justify-content: center;
  margin-top: 25px; /* Add some space above the buttons */
}

.contact {
  background-color: #8B4513; /* Dark brown to match the submit button */
  color: white;
  text-align: center;
  width: 150px; /* Set a fixed width for the buttons */
  margin: 0 10px; /* Space between the two buttons */
  padding: 10px;
  font-size: 12px;
  border-radius: 20px; /* Softer border radius */
  text-decoration: none;
}

.contact:hover {
  background-color: #A0522D; /* Lighter shade of brown on hover */
}

/* Two-column layout */
.col {
  float: left;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* Hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* Bottom container */
.bottom-container {
  text-align: center;
  border-radius: 0px 0px 4px 4px;
  font-family: Times New Roman;
  font-size: 40px;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: -10px;
  }
  /* Hide the vertical line */
  .vl {
    display: none;
  }
}

</style>
</head>
<body>

<h2 style="text-align:center; color: white; font-family: Times New Roman;" >Login Form</h2>
<p></p>

<div class="container">
  <form action="logininsert.php" method="POST">
    <div class="row">
      <h2 style="text-align:center; font-family: Times New Roman; font-style: italic;">Login Or SignUp </h2>
      <div class="vl"> </div>


    <div class="col">
        
   
        <img src="imgg/logod.png" alt="Logo" style="display: block; margin: 0 auto; width: 400px; height: auto;">
       <!-- Add the buttons for "About Us" and "Contact Us" -->
        <div class="button-container">
		    <a href="aboutus.php" class="contact">About Us</a>
            <a href="contactus.php" class="contact">Contact Us</a>
    </div>		
		
      </div>
	
	
	

      <div class="col">
       

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
      </div>
      
    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="signup.php" style="color:black" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="#" style="color:black" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

</body>
</html>
																															