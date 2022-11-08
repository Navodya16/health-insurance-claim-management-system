<?php 

include('../middleware/hospitalMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $category = getById("reportcat", $id);

                    if(mysqli_num_rows($category) > 0)
                    {
                        $data = mysqli_fetch_array($category);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Report category
                                    <a href="category.php" class="btn btn-primary float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Category Name" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Description</label>
                                                <input type="text" name="description" value="<?= $data['description'] ?>" placeholder="Enter description" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        echo "Category not found";
                    }
                    
                }
                else
                {
                    echo "Id missing from url";
                }
                    ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>