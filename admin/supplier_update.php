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

    
    $items=$result->fetch_array();
    $bid=$items['bid'];
    $spid=$items['spid'];
    $suname=$items['suname'];
    $sucity=$items['sucity'];
    $suloc=$items['suloc'];
    $supin=$items['supin'];
    $suqprice=$items['suqprice'];
    $sid=$items['sid'];
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
                    <input type="int" name="bid" value="<?php echo $bid; ?>" placeholder="Bill ID">
                </div>
                <div class="column">
                    <label>Supplier ID</label>
                    <input type="int" name="spid" value="<?php echo $spid; ?>" placeholder="Supplier ID"> 
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Supplier Name</label>
                    <input type="text" name="suname" value="<?php echo $suname; ?>" placeholder="Supplier Name"> 
                </div>
                <div class="column">
                    <label>City</label>
                    <input type="text" name="sucity" value="<?php echo $sucity; ?>" placeholder="City"> 
                </div>
            </div>
            <div class="row">
                <div class="column">
                      <label>Location</label>
                      <input type="text" name="suloc" value="<?php echo $suloc; ?>" placeholder="Store Location"> 
                </div>
                <div class="column">
                      <label>Pincode</label>
                      <input type="int" name="supin" value="<?php echo $supin; ?>" placeholder="Store Pincode"> 
                </div>
          </div>
            <div class="row">
                <div class="column">
                    <label>Quoted Price</label>
                    <input type="int" name="suqprice" value="<?php echo $suqprice; ?>" placeholder="Quoted Price"> 
                </div>
                <div class="column">
                    <label>Store ID</label>
                    <input type="int" name="sid" value="<?php echo $sid; ?>" placeholder="Store ID"> 
                </div>
            </div>
                <input type="submit" name="update" class="button" value="Update">
      </form>
  </div>
  
</body>
</html>