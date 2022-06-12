<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>
            Medicine Details
    </title>
    <style>
        body {
            font-family: $font-family;
    font-size: $font-size;
    background-size: 200% 100% !important;
    transform: translate3d(0, 0, 0);
    background: linear-gradient(45deg, #49D49D 10%, #A2C7E5 90%);
    height: 100vh
}
    h2{
        margin: 0 450px;
    }
    

    </style>
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <form action="" method="GET">
                              <div class="input-group mb-3">
                                   <h2>MEDICINE DETAILS</h2>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                              $conn=mysqli_connect("localhost","root","","pharmacyms");

                              $sql = "SELECT COUNT(*) AS Count FROM medicine";
                              $result = $conn->query($sql);
                              $row = $result->fetch_assoc();
                              echo '<span style="color:#DC143C;">TOTAL MEDICINES:</span>';
                              ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Count'];


                            ?>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Store ID</th>
                                    <th scope="col">Drug ID</th>
                                    <th scope="col">Manufacture Date</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Manufacturer</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Patient ID</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                                
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php

$conn=mysqli_connect("localhost","root","","pharmacyms");

    $query="SELECT * FROM medicine";

    $query_run=mysqli_query($conn,$query);

    $nums= mysqli_num_rows($query_run);

    if(mysqli_num_rows($query_run)>0)
    {
        foreach($query_run as $items)
        {
            ?>
            <tr>
            <td><?php echo $items['sid'];?></td>
            <td><?php echo $items['mdid'];?></td>
            <td><?php echo $items['mdate'];?></td>
            <td><?php echo $items['mqtt'];?></td>
            <td><?php echo $items['mprice'];?></td>
            <td><?php echo $items['mmanf'];?></td>
            <td><?php echo $items['mexd'];?></td>
            <td><?php echo $items['pid'];?></td>
            <td><a href="medicine_update.php?id=<?php echo $items['mdid']; ?>" data-toggle="
            tooltip" data-placement="bottom" title="EDIT"> <i class="fa fa-trash" aria-hidden="true">EDIT</i> </a> </td>
            <td><a href="medicine_delete.php?id=<?php echo $items['mdid']; ?>" data-toggle="
            tooltip" data-placement="bottom" title="DELETE"> <i class="fa fa-trash" aria-hidden="true">DELETE</i> </a> </td>
         
            </tr>


            <?php


        }

    }
    else
    {
        ?>
        <tr>
            <td colspan="3">no record found</td>
        </tr>

        <?php
    }

?>
                                <tr>
                                    <td></td>
                                </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    
    
    



</body>
</html>