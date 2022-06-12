<?php
error_reporting(0);
$conn=mysqli_connect("localhost","root","","pharmacyms");
if(!$conn)
{
    echo"Not connected to server";
}
if(!mysqli_select_db($conn,'pharmacyms'))
{
    
    echo "Database not selected";
}

$username=$_POST['username'];
$password=$_POST['password'];
$username=stripcslashes($username);
$password=stripcslashes($password);
$username=mysqli_real_escape_string($conn,$username);
$password=mysqli_real_escape_string($conn,$password);

$sql="SELECT * FROM `admin login` WHERE username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
  if($count===1){
  if ($_POST['submit']) 
{
 header('Location: home.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-compatible" content="ie=edge">
	<link rel="stylesheet" href="reglog.css">
	<title> Admin Login Page</title>
    
</head>
<body>
    <div class="login-wrapper">
	    <form id="login" method="POST" class="form">
            <img  src="user.jpg" alt="">
		 									
		   <h2>Admin Login</h2>
	       <div class="input-group">
			   <input type="text" name="username" id="username" required>
		       <label for="loginuser">Username</label>
           </div>
           <div class="input-group">
		      <input type="password" name="password" id="password" required>
		      <label for="loginpassword">Password</label>
           </div>
		   <a href="login.php" class="register">User login</a>
		   <br>
		   <br>
           <input type="submit" name="submit" value="Login" class="submit-btn">
      </form>
   </div>
</body>
</html>