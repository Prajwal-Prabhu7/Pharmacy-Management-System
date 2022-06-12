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


$id = $_GET['id'];

$query = "DELETE FROM patient WHERE pid='$id'";

$query_run = mysqli_query($conn, $query);

if($query_run)
{
    ?>
    <script> 
    alert("Data Deleted"); 
    </script>
    <?php
    header("Location:patient_details.php");
}
else
{
    ?>
    <script> alert("Data Not Deleted"); </script>
    <?php
}

?>