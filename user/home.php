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
                    <li><a href="patient.php">PATIENT</a></li>
                    <li><a href="doctor.php">DOCTOR</a></li>
                    <li><a href="hospital.php">HOSPITAL</a></li>
                    <li><a href="pharmacy.php">PHARMACY</a></li>
                    <li><a href="bill.php">BILL</a></li>
                    <li><a href="medicine.php">MEDICINE</a></li>
                    <li><a href="supplier.php">SUPPLIER</a></li>
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
            <p class="par">“To update and delete the details ▼ "<br> </p>
                <button class="cn"><a href="home_update_delete.php">Update/Delete</a></button>
        </div>
    </div>
</body>
</html>