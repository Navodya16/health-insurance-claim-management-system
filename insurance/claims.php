<?php 

include('../middleware/insuranceMiddleware.php');
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
                                <th>Patient Name</th>
                                <th>Hospital Name</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Paid</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                if(isset($_SESSION['auth']))
                                {
                                    $insuranceID = $_SESSION['auth_user']['userid'];
                                }
                                $claims_query = "SELECT * FROM claims WHERE insurance_id='$insuranceID' ";
                                $claims_query_run = mysqli_query($con, $claims_query);
                                
                                if(mysqli_num_rows($claims_query_run) > 0)
                                {
                                    foreach($claims_query_run as $item)
                                    {
                                        $patient_name = getUserName("users", $item['patient_id']);
                                        $hospital_name = getUserName("users", $item['hospital_id']);
                                        $status = getStatus("claims", $item['id']);
                                        $paid = getPaid("claims", $item['id']);

                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <!-- <td> <?//= $item['patient_id']; ?></td> -->
                                                <td> <?= $patient_name; ?></td>
                                                <td> <?= $hospital_name; ?></td>
                                                <td> <?= $item['price']; ?></td>
                                                <td> <?= $status; ?></td>
                                                <td> <?= $paid; ?></td>
                                                <td>
                                                    <form action="view-claim-details.php" method="POST">
                                                        <input type="hidden" name="claim_id" value="<?= $item['id']; ?>">
                                                        <input type="hidden" name="patient_id" value="<?= $item['patient_id']; ?>">
                                                        <input type="hidden" name="patient_name" value="<?= $patient_name; ?>">
                                                        <input type="hidden" name="hospital_name" value="<?= $hospital_name; ?>">
                                                        <input type="hidden" name="price" value="<?= $item['price']; ?>">
                                                        <input type="hidden" name="status" value="<?= $status; ?>">
                                                        <button type="submit" class="btn btn-sm btn-danger" name="see_more_details">View Details</button>
                                                    </form>
                                                </td>
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