<?php

//session_start();
include('../middleware/insuranceMiddleware.php');
include('includes/header.php');

if(isset($_POST['see_more_details']))
{
    $claim_id = mysqli_real_escape_string($con, $_POST['claim_id']);

    $patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);

    $patient_name = mysqli_real_escape_string($con, $_POST['patient_name']);

    $hospital_name = mysqli_real_escape_string($con, $_POST['hospital_name']);

    $totalprice = mysqli_real_escape_string($con, $_POST['price']);

    $status = mysqli_real_escape_string($con, $_POST['status']);

    $patient_insurance_policy_query = "SELECT userid FROM users WHERE id='$patient_id' ";
    $patient_insurance_policy_query_run = mysqli_query($con, $patient_insurance_policy_query);


}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>CLAIM DETAILS OF THE PATIENT</h3>
                </div>
                <div class="card-body">
                    <h5>claim id : <?= $claim_id ?></h5>
                    <h5>patient name: <?= $patient_name ?></h5>
                    <!-- <h5>patient's insurance policy id: </h5> -->
                    <h5>hospital name: <?= $hospital_name ?></h5>
                    <hr>
                    <hr>
                    <h4>TESTS AND REPORTS</h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Report Id</th>
                                <th>Report Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $reports =  getByClaimId("claim_reports", $claim_id);
                                if(mysqli_num_rows($reports) > 0)
                                {
                                    foreach($reports as $item)
                                    {
                                        $report_id = $item['report_id'];
                                        $reportName = getReportName("reports", $report_id);
                                        $reportPrice = getReportPrice("reports", $report_id);

                                        ?>
                                            <tr>
                                                <td> <?= $report_id; ?></td>
                                                <td> <?= $reportName; ?></td>
                                                <td> <?= $reportPrice; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No records found";
                                }   
                            
                            ?>
                            <tr>
                                <td> </td>
                                <td> Total Price </td>
                                <td> <?= $totalprice; ?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <hr>
                    <hr>
                    <!-- <h4>SELECTED DOCUMENTS</h4> -->
                    <hr>
                    <hr>
                    <form action="code.php" method="POST">
                        <div class="row">
                            <input type="hidden" name="totalPrice" value="<?= $totalprice; ?>">
                            <input type="hidden" name="claimid" value="<?= $claim_id; ?>">
                            <div class="col-md-6">
                                <?php
                                    if($status=='pending')
                                    {
                                        ?>
                                            <button type="submit" class="btn btn-primary" name="approve_claim_btn">Approve</button>
                                            <button type="submit" class="btn btn-primary" name="reject_claim_btn">Reject</button>
                                        <?php
                                    }
                                ?>
                                <!-- <button type="submit" class="btn btn-primary" name="approve_claim_btn">Approve</button>
                                <button type="submit" class="btn btn-primary" name="reject_claim_btn">Reject</button> -->
                            </div>
                        </div>
                    </form>
                    <!-- <a href="code.php?id" class="btn btn-sm btn-primary">Edit</a> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>