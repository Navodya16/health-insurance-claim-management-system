<?php 

include('../middleware/hospitalMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Patients</h4>
                </div>
                <div class="card-body" id="reports_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $patient = getAll("users");
                                
                                if(mysqli_num_rows($patient) > 0)
                                {
                                    foreach($patient as $item)
                                    {
                                        $userType = $item['userType'];
                                        if($userType == '2')
                                        {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['name']; ?></td>
                                                <td> <?= $item['email']; ?></td>
                                                <td>
                                                    <a href="add-claim.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Add Claim</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
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