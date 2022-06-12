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

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];

    $update = true;

    $result = $conn->query("SELECT * FROM patient WHERE pid='$pid'");

    $pid=$_POST['pid'];
    $pname=$_POST['pname'];
    $pgender=$_POST['pgender'];
    $paddress=$_POST['paddress'];
    $pcontact=$_POST['pcontact'];
    $pdetails=$_POST['pdetails'];
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
                    <input type="int" name="pid" value="<?php echo $pid;?>" >
                </div>
                <div class="column">
                    <label>Patient Name</label>
                    <input type="text" name="pname" value="<?php echo $pname;?>" >
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Gender</label>
                    <input type="text" name="pgender" value="<?php echo $pgender;?>">
                </div>
                <div class="column">
                    <label>Address</label>
                    <textarea id="issue" type="text" name="paddress" value="<?php echo $paddress;?>" rows="2"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Contact Number</label>
                    <textarea id="issue"  type="text" name="pcontact" value="<?php echo $pcontact;?>" rows="1"></textarea>
                </div>
                <div class="column">
                    <label>Details</label>
                    <textarea id="issue"  type="text" name="pdetails" value="<?php echo $pdetails;?>" rows="2"></textarea>
                </div>
            </div>
                <input type="submit" name="update" class="button" value="Update">
      </form>
  </div>
  
</body>
</html>