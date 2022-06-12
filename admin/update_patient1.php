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
    $pid = $_GET['id'];

    $update = true;

    $result = $conn->query("SELECT * FROM patient WHERE pid='$pid'");

    $items=$result->fetch_array();
    $pid=$items['pid'];
    $pname=$items['pname'];
    $pgender=$items['pgender'];
    $paddress=$items['paddress'];
    $pcontact=$items['pcontact'];
    $pdetails=$items['pdetails'];
}

if(isset($_POST['update'])){

    $pid=$_POST['pid'];
    $pname=$_POST['pname'];
    $pgender=$_POST['pgender'];
    $paddress=$_POST['paddress'];
    $pcontact=$_POST['pcontact'];
    $pdetails=$_POST['pdetails'];

    $conn->query("UPDATE patient SET pid = '$pid',pname = '$pname',pgender = '$pgender',paddress = '$paddress', pcontact = '$pcontact',pdetails = '$pdetails' WHERE pid='$pid'") or die($conn->error);
    
}

    if($_POST['update'])
    {
       header('Location:patient_details.php');
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
                    <input type="int" name="pid" value="<?php echo $pid; ?>" placeholder="Patient ID">
                </div>
                <div class="column">
                    <label>Patient Name</label>
                    <input type="text" name="pname" value="<?php echo $pname; ?>" placeholder="Patient Name">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Gender</label>
                    <input type="text" name="pgender" value="<?php echo $pgender; ?>" placeholder="Patient Gender">
                </div>
                <div class="column">
                    <label>Address</label>
                    <input type="text" name="paddress" value="<?php echo $paddress; ?>" placeholder="Patient Address">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Contact Number</label>
                    <input type="text" name="pcontact" value="<?php echo $pcontact; ?>" placeholder="Patient Contact" >
                </div>
                <div class="column">
                    <label>Details</label>
                    <input type="text" name="pdetails" value="<?php echo $pdetails; ?>" placeholder="Patient Details" >
                </div>
            </div>
                <input type="submit" name="update" class="button" value="Update">
      </form>
  </div>
  
</body>
</html>