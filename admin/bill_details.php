<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>
            Bill Details
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
                                   <h2>BILL DETAILS</h2>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                              $conn=mysqli_connect("localhost","root","","pharmacyms");

                              $sql = "SELECT COUNT(*) AS Count FROM bill";
                              $result = $conn->query($sql);
                              $row = $result->fetch_assoc();
                              echo '<span style="color:#fff;">TOTAL BILLS:</span>';
                              ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Count'];


                            ?>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Drug ID</th>
                                    <th scope="col">Doctor ID</th>
                                    <th scope="col">Patient ID</th>
                                    <th scope="col">Store ID</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php

$conn=mysqli_connect("localhost","root","","pharmacyms");

    $query="SELECT * FROM bill";

    $query_run=mysqli_query($conn,$query);

    $nums= mysqli_num_rows($query_run);

    if(mysqli_num_rows($query_run)>0)
    {
        foreach($query_run as $items)
        {
            ?>
            <tr>
            <td><?php echo $items['bid'];?></td>
            <td><?php echo $items['bamt'];?></td>
            <td><?php echo $items['bqtt'];?></td>
            <td><?php echo $items['mdid'];?></td>
            <td><?php echo $items['did'];?></td>
            <td><?php echo $items['pid'];?></td>
            <td><?php echo $items['sid'];?></td>
            <td><a href="bill_update.php?id=<?php echo $items['bid']; ?>" data-toggle="
            tooltip" data-placement="bottom" title="EDIT"> <i class="fa fa-trash" aria-hidden="true">EDIT</i> </a> </td>
            <td><a href="bill_delete.php?id=<?php echo $items['bid']; ?>" data-toggle="
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