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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">P P</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="patient_details.php">PATIENT</a></li>
                    <li><a href="doctor_details.php">DOCTOR</a></li>
                    <li><a href="hospital_details.php">HOSPITAL</a></li>
                    <li><a href="pharmacy_details.php">PHARMACY</a></li>
                    <li><a href="bill_details.php">BILL</a></li>
                    <li><a href="medicine_details.php">MEDICINE</a></li>
                    <li><a href="supplier_details.php">SUPPLIER</a></li>
                </ul>
            </div>
        </div> 
        <div class="content">
            <h1>Pharmacy<br><span>Management</span> <br>System</h1>
            <br>
            <p class="par">“Health is hearty, health is harmony, health is happiness.”<br> </p>
                <button class="cn"><a href="login.php">Logout</a></button>
                <br>
                <br>
                <button class="cn"><a href="home.php">Home</a></button>
        </div>
    </div>
</body>
</html>