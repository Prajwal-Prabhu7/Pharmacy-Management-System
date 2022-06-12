<?php
error_reporting(0);
$conn=mysqli_connect("localhost","root","",'pharmacyms');
if(!$conn)
{
    echo"Not connected to server";

}
if(!mysqli_select_db($conn,'pharmacyms'))
{
    
    echo "Database not selected";
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

$user=$_POST['username'];
$mail=$_POST['email'];
$pass=$_POST['password'];

$sql="INSERT INTO `register`(`username`, `email`, `password`) VALUES ('$user','$mail','$pass')";

if(!mysqli_query($conn,$sql))
{
    echo"not inserted";
}
else{
    echo"Inserted";
    if (isset($_POST['submit'])) {
        header("Location: register.php");
    }
}
}
if (isset($_POST['submit'])) {
    header("Location:login.php");
}
?>
<html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-compatible" content="ie=edge">
	<link rel="stylesheet" href="reglog.css">
	<title>Registration Form</title>
</head>
<body>
    <div class="login-wrapper">
	    <form id="register" method="POST" class="form">
            <img  src="user.jpg" alt="">								
		    <h2>Register</h2>
	       <div class="input-group">
			   <input type="text" name="username" id="username" required>
		      <label for="loginuser">Username</label>
           </div>
           <div class="input-group">
		      <input type="text" name="email" id="email" required>
		      <label for="loginpassword">Email</label>
           </div>
           <div class="input-group">
		      <input type="password" name="password" id="password" required>
		      <label for="loginpassword">Password</label>
           </div>
           <input type="submit" name="submit" value="Register" class="submit-btn">
      </form>
   </div>
</body>
</html>