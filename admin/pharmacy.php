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
$pstate=$_POST['pstate'];
$pcity=$_POST['pcity'];
$ploc=$_POST['ploc'];
$ppin=$_POST['ppin'];
$psname=$_POST['psname'];
$hid=$_POST['hid'];

$sql="INSERT INTO `pharmacy`(`sid`, `pstate`, `pcity`, `ploc`, `ppin`, `psname`, `hid`) VALUES ('$sid','$pstate','$pcity','$ploc','$ppin','$psname','$hid')";

if(!mysqli_query($conn,$sql))
{
    echo"not inserted";
}
else{
    echo"Inserted";
    if (isset($_POST['submit'])) {
        header("Location: pharmacy.php");
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
    <title>Pharmacy Form</title>
</head>
<body>
    <div class="container">
        <h1>PHARMACY DETAILS</h1>
        <form id='patient' class="form" method="POST">
            <div class="row">
                <div class="column">
                    <label>Store ID</label>
                    <input type="int" name="sid" >
                </div>
                <div class="column">
                    <label>State</label>
                    <input type="text" name="pstate" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>City</label>
                    <input type="text" name="pcity">
                </div>
                <div class="column">
                    <label>Location</label>
                    <input type="text" name="ploc" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                      <label>Pincode</label>
                      <input type="int" name="ppin" >
                </div>
          </div>
            <div class="row">
                <div class="column">
                    <label>Pharmacy Name</label>
                    <input type="text" name="psname" >
                </div>
                <div class="column">
                    <label>Hospital ID</label>
                    <input type="int" name="hid" >
                </div>
            </div>
                <input type="submit" name="submit" class="button" value="Submit">
      </form>
  </div>
  
</body>
</html>