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
    $bid = $_GET['id'];

    $update = true;

    $result = $conn->query("SELECT * FROM bill WHERE bid='$bid'");

    $items=$result->fetch_array();
    $bid=$items['bid'];
    $bamt=$items['bamt'];
    $bqtt=$items['bqtt'];
    $mdid=$items['mdid'];
    $did=$items['did'];
    $pid=$items['pid'];
    $sid=$items['sid'];
}

if(isset($_POST['update'])){
   
$bid=$_POST['bid'];
$bamt=$_POST['bamt'];
$bqtt=$_POST['bqtt'];
$mdid=$_POST['mdid'];
$did=$_POST['did'];
$pid=$_POST['pid'];
$sid=$_POST['sid'];

    $conn->query("UPDATE bill SET bid = '$bid',bamt = '$bamt',bqtt = '$bqtt',mdid = '$mdid', did=$did ,pid = '$pid' ,sid=$sid WHERE bid='$bid'") or die($conn->error);
    
}

    if($_POST['update'])
    {
       header('Location:bill_details.php');
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
                    <input type="int" name="bid" value="<?php echo $bid; ?>" placeholder="Bill ID"> 
                </div>
                <div class="column">
                    <label>Amount</label>
                    <input type="int" name="bamt" value="<?php echo $bamt; ?>" placeholder="Amount"> 
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Quantity</label>
                    <input type="int" name="bqtt" value="<?php echo $bqtt; ?>" placeholder="Quantity"> 
                </div>
                <div class="column">
                    <label>Drug ID</label>
                    <input type="int" name="mdid" value="<?php echo $mdid; ?>" placeholder="Drug ID"> 
                </div>
            </div>
            <div class="row">
                <div class="column">
                      <label>Doctor ID</label>
                      <input type="int" name="did" value="<?php echo $did; ?>" placeholder="Doctor ID"> 
                </div>
          </div>
            <div class="row">
                <div class="column">
                    <label>Patient ID</label>
                    <input type="int" name="pid" value="<?php echo $pid; ?>" placeholder="Patient ID"> 
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