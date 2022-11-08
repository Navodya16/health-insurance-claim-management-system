<?php 

include('../middleware/customerMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Patient Claims</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Claim ID</th>
                                <th>Hospital Name</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_SESSION['auth']))
                                {
                                    $patientID = $_SESSION['auth_user']['userid'];
                                }
                                $claims_query = "SELECT * FROM claims WHERE patient_id='$patientID' ";
                                $claims_query_run = mysqli_query($con, $claims_query);
                                
                                if(mysqli_num_rows($claims_query_run) > 0)
                                {
                                    foreach($claims_query_run as $item)
                                    {
                                        $hospital_name = getUserName("users", $item['hospital_id']);
                                        //$insurance_name = getUserName("users", $item['insurance_id']);
                                        $status = getStatus("claims", $item['id']);
                                        $paid = getPaid("claims", $item['id']);

                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <!-- <td> <?//= $item['patient_id']; ?></td> -->
                                                <td> <?= $hospital_name; ?></td>
                                                <td> <?= $item['price']; ?></td>
                                                <td> <?= $status; ?></td>
                                                <td> <?= $paid; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No records found";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>