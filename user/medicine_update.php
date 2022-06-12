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

    $result = $conn->query("SELECT * FROM medicine WHERE mdid='$id'");
    $sid=$_POST['sid'];
    $mdid=$_POST['mdid'];
    $mdate=$_POST['mdate'];
    $mqtt=$_POST['mqtt'];
    $mprice=$_POST['mprice'];
    $mmanf=$_POST['mmanf'];
    $mexd=$_POST['mexd'];
    $pid=$_POST['pid'];
}

if(isset($_POST['update'])){
    $sid=$_POST['sid'];
    $mdid=$_POST['mdid'];
    $mdate=$_POST['mdate'];
    $mqtt=$_POST['mqtt'];
    $mprice=$_POST['mprice'];
    $mmanf=$_POST['mmanf'];
    $mexd=$_POST['mexd'];
    $pid=$_POST['pid'];

    $conn->query("UPDATE medicine SET sid = '$sid',mdid = '$mdid',mdate = '$mdate',mqtt = '$mqtt', mprice = '$mprice',mmanf=$mmanf,mexd=$mexd,pid=$pid WHERE mdid='$mdid'") or die($conn->error);
    
}

    if($_POST['update'])
    {
       header('Location:medicine_details.php');
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
                <input type="submit" name="update" class="button" value="Update">
      </form>
  </div>
  
</body>
</html>