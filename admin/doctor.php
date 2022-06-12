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

$did=$_POST['did'];
$dname=$_POST['dname'];
$dcontact=$_POST['dcontact'];
$hname=$_POST['hname'];
$pid=$_POST['pid'];

$sql="INSERT INTO `doctor`(`did`, `dname`, `dcontact`, `hname`, `pid`) VALUES ('$did','$dname','$dcontact','$hname','$pid')";

if(!mysqli_query($conn,$sql))
{
    echo"not inserted";
}
else{
    echo"Inserted";
    if (isset($_POST['submit'])) 
    {
        header("Location:doctor.php");
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
    <title>Doctor Form</title>
</head>
<body>
    <div class="container">
        <h1>DOCTOR DETAILS</h1>
        <form id='patient'  method="POST" class="form">
            <div class="row">
                <div class="column">
                    <label>Doctor ID</label>
                    <input type="int" name="did" >
                </div>
                <div class="column">
                    <label>Doctor Name</label>
                    <input type="text" name="dname" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Contact</label>
                    <input type="text" name="dcontact">
                </div>
                <div class="column">
                    <label>Hospital Name</label>
                    <input type="text" name="hname">
                </div>
            </div>
            <div class="row">
            <div class="column">
                    <label>Patient ID</label>
                    <input type="text" name="pid">
                </div>
            </div>
            <input type="submit" name="submit" class="button" value="Submit">
        </form>
    </div>
</body>
</html>