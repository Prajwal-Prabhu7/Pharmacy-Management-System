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

    $result = $conn->query("SELECT * FROM doctor WHERE did='$id'");
    $did=$_POST['did'];
    $dname=$_POST['dname'];
    $dcontact=$_POST['dcontact'];
    $hname=$_POST['hname'];
    $pid=$_POST['pid'];
}

if(isset($_POST['update'])){
    $did=$_POST['did'];
    $dname=$_POST['dname'];
    $dcontact=$_POST['dcontact'];
    $hname=$_POST['hname'];
    $pid=$_POST['pid'];

    $conn->query("UPDATE doctor SET did = '$did',dname = '$dname',dcontact = '$dcontact',hname = '$hname', pid = '$pid' WHERE did='$did'") or die($conn->error);
    
}

    if($_POST['update'])
    {
       header('Location:doctor_details.php');
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
                    <input type="int" name="did" value="<?php echo $did;?>" >
                </div>
                <div class="column">
                    <label>Doctor Name</label>
                    <input type="text" name="dname" value="<?php echo $dname;?>">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Contact</label>
                    <input type="text" name="dcontact" value="<?php echo $dcontact;?>">
                </div>
                <div class="column">
                    <label>Hospital Name</label>
                    <input type="text" name="hname" value="<?php echo $hname;?>">
                </div>
            </div>
            <div class="row">
            <div class="column">
                    <label>Patient ID</label>
                    <input type="text" name="pid" value="<?php echo $pid;?>">
                </div>
            </div>
            <input type="submit" name="update" class="button" value="Update">
        </form>
    </div>
</body>
</html>