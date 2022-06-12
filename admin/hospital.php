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

$hid=$_POST['hid'];
$hname=$_POST['hname'];
$hloc=$_POST['hloc'];
$hpin=$_POST['hpin'];
$did=$_POST['did'];
$pid=$_POST['pid'];

$sql="INSERT INTO `hospital`(`hid`, `hname`, `hloc`, `hpin`, `did`, `pid`) VALUES ('$hid','$hname','$hloc','$hpin','$did','$pid')";

if(!mysqli_query($conn,$sql))
{
    echo"not inserted";
}
else{
    echo"Inserted";
    if (isset($_POST['submit'])) {
        header("Location: hospital.php");
    }
}
}
if (isset($_POST['submit'])) {
    header("Location:home.php");
}
?>
<html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="menus.css">
    <title>hospital Form</title>
</head>
<body>
    <div class="container">
        <h1>HOSPITAL DETAILS</h1>
        <form id='patient' class="form" method="POST">
            <div class="row">
                <div class="column">
                    <label>Hospital ID</label>
                    <input type="int" name="hid" >
                </div>
                <div class="column">
                    <label>Hospital Name</label>
                    <input type="text" name="hname" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Location</label>
                    <input type="text" name="hloc">
                </div>
                <div class="column">
                    <label>Pincode</label>
                    <input type="int" name="hpin" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Doctor ID</label>
                    <input type="int" name="did" >
                </div>
                <div class="column">
                    <label>Patient ID</label>
                    <input type="int" name="pid" >
                </div>
            </div>
                <input type="submit" name="submit" class="button" value="Submit">
      </form>
  </div>
  
</body>
</html>