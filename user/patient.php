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

$pid=$_POST['pid'];
$pname=$_POST['pname'];
$pgender=$_POST['pgender'];
$paddress=$_POST['paddress'];
$pcontact=$_POST['pcontact'];
$pdetails=$_POST['pdetails'];

$sql="INSERT INTO `patient`(`pid`, `pname`, `pgender`, `paddress`, `pcontact`, `pdetails`) VALUES ('$pid','$pname','$pgender','$paddress','$pcontact','$pdetails')";

if(!mysqli_query($conn,$sql))
{
    echo"not inserted";
}
else{
    echo"Inserted";
    if (isset($_POST['submit'])) {
        header("Location:patient.php");
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
    <title>Patient Form</title>
</head>
<body>
    <div class="container">
        <h1>PATIENT DETAILS</h1>
        <form id='patient' class="form" method="POST">
            <div class="row">
                <div class="column">
                    <label>Patient ID</label>
                    <input type="int" name="pid" >
                </div>
                <div class="column">
                    <label>Patient Name</label>
                    <input type="text" name="pname" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Gender</label>
                    <input type="text" name="pgender">
                </div>
                <div class="column">
                    <label>Address</label>
                    <textarea id="issue" type="text" name="paddress" rows="2"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Contact Number</label>
                    <textarea id="issue"  type="text" name="pcontact" rows="1"></textarea>
                </div>
                <div class="column">
                    <label>Details</label>
                    <textarea id="issue"  type="text" name="pdetails" rows="2"></textarea>
                </div>
            </div>
                <input type="submit" name="submit" class="button" value="Submit">
      </form>
  </div>
  
</body>
</html>