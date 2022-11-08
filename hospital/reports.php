<?php 

include('../middleware/hospitalMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Reports</h4>
                </div>
                <div class="card-body" id="reports_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_SESSION['auth']))
                                {
                                    $hospitalID = $_SESSION['auth_user']['userid'];
                                }
                                //$categories = getAll("reportcat"); 
                                $report = getByHospitalId("reports", $hospitalID);
                                //$report = getAll("reports");
                                
                                if(mysqli_num_rows($report) > 0)
                                {
                                    foreach($report as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['name']; ?></td>
                                                <td> <?= $item['price']; ?></td>
                                                <td>
                                                    <a href="edit-report.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger delete_report_btn" value="<?= $item['id']; ?>" >Delete</button>                                          
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