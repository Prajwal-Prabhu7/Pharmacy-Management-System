<?php
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
$spid=$_POST['spid'];
$suname=$_POST['suname'];
$sucity=$_POST['sucity'];
$suloc=$_POST['suloc'];
$supin=$_POST['supin'];
$suqprice=$_POST['suqprice'];
$sid=$_POST['sid'];

$sql="INSERT INTO `supplier`(`bid`, `spid`, `suname`, `sucity`, `suloc`, `supin`, `suqprice`, `sid`) VALUES ('$bid','$spid','$suname','$sucity','$suloc','$supin','$suqprice','$sid')";

if(!mysqli_query($conn,$sql))
{
    echo"not inserted";
}
else{
    echo"Inserted";
    if (isset($_POST['submit'])) {
        header("Location:supplier.php");
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
    <title>Supplier Form</title>
</head>
<body>
    <div class="container">
        <h1>SUPPLIER DETAILS</h1>
        <form id='patient' class="form" method="POST">
            <div class="row">
                <div class="column">
                    <label>Bill ID</label>
                    <input type="int" name="bid" >
                </div>
                <div class="column">
                    <label>Supplier ID</label>
                    <input type="int" name="spid" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Supplier Name</label>
                    <input type="text" name="suname">
                </div>
                <div class="column">
                    <label>City</label>
                    <input type="text" name="sucity" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                      <label>Location</label>
                      <input type="text" name="suloc" >
                </div>
                <div class="column">
                      <label>Pincode</label>
                      <input type="int" name="supin" >
                </div>
          </div>
            <div class="row">
                <div class="column">
                    <label>Quoted Price</label>
                    <input type="int" name="suqprice" >
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