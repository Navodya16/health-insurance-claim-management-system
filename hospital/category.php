<?php 

include('../middleware/hospitalMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories</h4>
                </div>
                <div class="card-body" id="category_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
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
                                //$category = getAll("reportcat");
                                $category = getByHospitalId("reportcat", $hospitalID);
                                
                                if(mysqli_num_rows($category) > 0)
                                {
                                    foreach($category as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['name']; ?></td>
                                                <td>
                                                    <a href="edit-report-category.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>                           
                                                </td>
                                                <td>
                                                    <!-- <form action="code.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                        <button type="submit" class="btn btn-sm btn-danger" name="delete_category_btn">Delete</button>
                                                    </form> -->
                                                    <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id']; ?>" >Delete</button>
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