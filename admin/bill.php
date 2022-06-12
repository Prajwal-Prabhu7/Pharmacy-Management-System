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

$bid=$_POST['bid'];
$bamt=$_POST['bamt'];
$bqtt=$_POST['bqtt'];
$mdid=$_POST['mdid'];
$did=$_POST['did'];
$pid=$_POST['pid'];
$sid=$_POST['sid'];

$sql="INSERT INTO `bill`(`bid`, `bamt`, `bqtt`, `mdid`, `did`, `pid`, `sid`) VALUES ('$bid','$bamt','$bqtt','$mdid','$did','$pid','$sid')";

if(!mysqli_query($conn,$sql))
{
    echo"not inserted";
}
else{
    echo"Inserted";
    if (isset($_POST['submit'])) {
        header("Location:bill.php");
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
    <title>Bill Form</title>
</head>
<body>
    <div class="container">
        <h1>BILL DETAILS</h1>
        <form id='patient' class="form" method="POST">
            <div class="row">
                <div class="column">
                    <label>Bill ID</label>
                    <input type="int" name="bid" >
                </div>
                <div class="column">
                    <label>Amount</label>
                    <input type="int" name="bamt" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Quantity</label>
                    <input type="int" name="bqtt">
                </div>
                <div class="column">
                    <label>Drug ID</label>
                    <input type="int" name="mdid" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                      <label>Doctor ID</label>
                      <input type="int" name="did" >
                </div>
          </div>
            <div class="row">
                <div class="column">
                    <label>Patient ID</label>
                    <input type="int" name="pid" >
                </div>
                <div class="column">
                    <label>Store ID</label>
                    <input type="int" name="sid" >
                </div>
            </div>
                <input type="submit" name="submit" class="button" value="Submit">
      </form>
  </div>
  
</body>
</html>