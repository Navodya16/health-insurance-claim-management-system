<?php 

include('../middleware/hospitalMiddleware.php');
include('includes/header.php');

if(isset($_GET['claimnumber']))
{
    $claimid = $_GET['claimnumber'];
}

if(isset($_POST['add_to_cart']))
{
    if(isset($_SESSION['cart']))
    {
        $session_array_id = array_column($_SESSION['cart'], "id");
        if(!in_array($_GET['id'], $session_array_id))
        {
            $count = count($_SESSION['cart']);
            $session_array = array(
                'id' => $_GET['id'],
                "name" => $_POST['name'],
                "price" => $_POST['price']
            );
            $_SESSION['cart'][$count] = $session_array;
        }
    }
    else
    {
        $session_array = array(
            'id' => $_GET['id'],
            "name" => $_POST['name'],
            "price" => $_POST['price']
        );
        $_SESSION['cart'][0] = $session_array;
    }
}

if(isset($_GET['action']))
{
    if($_GET['action'] == "remove")
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['id'] == $_GET['id'])
            {
                unset($_SESSION['cart'][$key]);
            }
        }
    }

    else if($_GET['action'] == "clearall")
    {
        unset($_SESSION['cart']);
    }
}

 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Patient Claim</h4>
                </div>
                <div class="card-body">
                    <?php  
                        if(isset($_SESSION['auth']))
                        {
                            $hospitalID = $_SESSION['auth_user']['userid'];
                        } 
                        $report_select = "SELECT * FROM reports where hospital_id='$hospitalID'";
                        $report_select_run = mysqli_query($con, $report_select);

                        while($row = mysqli_fetch_array($report_select_run))
                        {
                            ?>
                                <form method="POST" action="add-patient-claim.php?claimnumber=<?=$claimid; ?>&action=add&id=<?=$row['id']; ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="<?= $row['name'] ?>">
                                            <input type="text" name="price" value="<?= $row['price'] ?>">
                                            <input type= "submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Add to Cart" />
                                        </div>
                                    </div>
                                </form>
                            <?php
                        }
                    ?>

                    <h3>order details</h3>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Report Name</th>
                                <th>Price</th>
                                <th>Action</th>   
                            </tr>
                            <?php
                                if(!empty($_SESSION['cart']))
                                {
                                    $total = 0;
                                    //$totalreports = "";
                                    $totalreports = array();
                                    foreach($_SESSION['cart'] as $key => $value)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $value['id']; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['price']; ?></td>
                                            <td><a href="add-patient-claim.php?claimnumber=<?=$claimid; ?>&action=remove&id=<?php echo $value['id']; ?>"><span class="text-danger">Remove</span></a></td>
                                        </tr>
                                        <?php
                                        $total = $total + $value['price'];
                                        //$totalreports = $totalreports.",".$value['id'];
                                        array_push($totalreports, $value['id'] );
                                    }
                                    ?>
                                        <tr>
                                            <td colspan="2">Total</td>
                                            <td><?php echo number_format($total, 2); ?></td>
                                            <td><a href="add-patient-claim.php?claimnumber=<?=$claimid; ?>&action=clearall"><span class="text-danger">Clear All</span></a></td>
                                        </tr>
                                    <?php
                                }
                                else
                                {
                                    $total = 0;
                                    $totalreports = array();
                                }
                            ?>
                        </table>
                    </div>

                    <h3>checkout</h3>
                    <?php //echo $total; ?>
                    <form action="code.php" method="POST">
                        <div class="row">
                            <input type="hidden" name="claimid" value="<?= $claimid; ?>">
                            <input type="hidden" name="totalPrice" value="<?= $total; ?>">
                            <!-- <input type="hidden" name="totalReports" value="<? //= $totalreports; ?>"> -->
                            <?php
                            foreach($totalreports as $val)
                            {
                                echo '<input type="hidden" name="totalReports[]" value="'.$val. '" >';
                            }
                            ?>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_patient_claim">Save</button>
                            </div>
                        </div>
                    </form>
                    <!-- <a href="code.php?claimid=&value=<?php echo $total; ?>"><span class="text-danger">checkout</span></a></td> -->
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>