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

$sid=$_POST['sid'];
$mdid=$_POST['mdid'];
$mdate=$_POST['mdate'];
$mqtt=$_POST['mqtt'];
$mprice=$_POST['mprice'];
$mmanf=$_POST['mmanf'];
$mexd=$_POST['mexd'];
$pid=$_POST['pid'];

$sql="INSERT INTO `medicine`(`sid`, `mdid`, `mdate`, `mqtt`, `mprice`, `mmanf`, `mexd`, `pid`) VALUES ('$sid','$mdid','$mdate','$mqtt','$mprice','$mmanf,'$mexd','$pid')";

if(!mysqli_query($conn,$sql))
{
    echo"not inserted";
}
else{
    echo"Inserted";
    if (isset($_POST['submit'])) {
        header("Location:medicine.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="menus.css">
    <title>Medicine Form</title>
</head>
<body>
    <div class="container">
        <h1>MEDICINE DETAILS</h1>
        <form id='patient' class="form" method="POST">
            <div class="row">
                <div class="column">
                    <label>Store ID</label>
                    <input type="int" name="sid" >
                </div>
                <div class="column">
                    <label>Drug ID</label>
                    <input type="int" name="did" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Manufacture Date</label>
                    <input type="date" name="mdate">
                </div>
                <div class="column">
                    <label>Quantity</label>
                    <input type="int" name="mqtt" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                      <label>Price</label>
                      <input type="int" name="mprice" >
                </div>
                <div class="column">
                      <label>Manufacturer</label>
                      <input type="text" name="mmanf" >
                </div>
          </div>
            <div class="row">
                <div class="column">
                    <label>Expire Date</label>
                    <input type="date" name="mexd" >
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