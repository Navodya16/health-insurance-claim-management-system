<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Registered Hospitals to the system</h4>
                </div>
                <div class="card-body" id="hospital_table">
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
                                $hospital = getAll("users");
                                
                                if(mysqli_num_rows($hospital) > 0)
                                {
                                    foreach($hospital as $item)
                                    {
                                        $userType = $item['userType'];
                                        if($userType == '1')
                                        {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['name']; ?></td>
                                                <td> <?= $item['email']; ?></td>
                                                <td>
                                                    <!-- <form action="code.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                        <button type="submit" class="btn btn-sm btn-danger" name="delete_category_btn">Delete</button>
                                                    </form> -->
                                                    <button type="button" class="btn btn-sm btn-danger delete_hospital_btn" value="<?= $item['id']; ?>" >Delete</button>
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