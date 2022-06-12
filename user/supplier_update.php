<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","pharmacyms");

if(!$conn)
{
    echo "not connected to server";
}

if(!mysqli_select_db($conn,'pharmacyms'))
{
    echo 'database not selected';
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $update = true;

    $result = $conn->query("SELECT * FROM supplier WHERE spid='$id'");

    $bid=$_POST['bid'];
    $spid=$_POST['spid'];
    $suname=$_POST['suname'];
    $sucity=$_POST['sucity'];
    $suloc=$_POST['suloc'];
    $supin=$_POST['supin'];
    $suqprice=$_POST['suqprice'];
    $sid=$_POST['sid'];
}

if(isset($_POST['update'])){

    $bid=$_POST['bid'];
    $spid=$_POST['spid'];
    $suname=$_POST['suname'];
    $sucity=$_POST['sucity'];
    $suloc=$_POST['suloc'];
    $supin=$_POST['supin'];
    $suqprice=$_POST['suqprice'];
    $sid=$_POST['sid'];

    $conn->query("UPDATE supplier SET bid = '$bid',spid = '$spid',suname = '$suname',sucity = '$sucity', suloc = '$suloc',supin=$supin,suqprice=$suqprice,sid=$sid WHERE spid='$spid'") or die($conn->error);
    
}

    if($_POST['update'])
    {
       header('Location:supplier_details.php');
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
                <input type="submit" name="update" class="button" value="Update">
      </form>
  </div>
  
</body>
</html>