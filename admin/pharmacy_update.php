<?php

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
    $sid = $_GET['id'];

    $update = true;

    $result = $conn->query("SELECT * FROM pharmacy WHERE sid='$sid'");

    $items=$result->fetch_array();
    $sid=$items['sid'];
    $pstate=$items['pstate'];
    $pcity=$items['pcity'];
    $ploc=$items['ploc'];
    $ppin=$items['ppin'];
    $psname=$items['psname'];
    $hid=$items['hid'];
}

if(isset($_POST['update'])){
    $sid=$_POST['sid'];
    $pstate=$_POST['pstate'];
    $pcity=$_POST['pcity'];
    $ploc=$_POST['ploc'];
    $ppin=$_POST['ppin'];
    $psname=$_POST['psname'];
    $hid=$_POST['hid'];

    $conn->query("UPDATE pharmacy SET sid = '$sid',pstate = '$pstate',pcity = '$pcity',ploc = '$ploc', ppin= '$ppin' ,psname = '$psname' ,hid= '$hid' WHERE sid='$sid'") or die($conn->error);
    
}

    if($_POST['update'])
    {
       header('Location:pharmacy_details.php');
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
                    <input type="int" name="sid" value="<?php echo $sid; ?>" placeholder="Store ID"> 
                </div>
                <div class="column">
                    <label>State</label>
                    <input type="text" name="pstate" value="<?php echo $pstate; ?>" placeholder="State"> 
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>City</label>
                    <input type="text" name="pcity" value="<?php echo $pcity; ?>" placeholder="Patient City"> 
                </div>
                <div class="column">
                    <label>Location</label>
                    <input type="text" name="ploc" value="<?php echo $ploc; ?>" placeholder="Patient Location"> 
                </div>
            </div>
            <div class="row">
                <div class="column">
                      <label>Pincode</label>
                      <input type="int" name="ppin" value="<?php echo $ppin; ?>" placeholder="Pincode"> 
                </div>
          </div>
            <div class="row">
                <div class="column">
                    <label>Pharmacy Name</label>
                    <input type="text" name="psname" value="<?php echo $psname; ?>" placeholder="Patient Name"> 
                </div>
                <div class="column">
                    <label>Hospital ID</label>
                    <input type="int" name="hid" value="<?php echo $hid; ?>" placeholder="Hospital ID"> 
                </div>
            </div>
                <input type="submit" name="update" class="button" value="Update">
      </form>
  </div>
  
</body>
</html>