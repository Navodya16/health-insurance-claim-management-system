<?php 

include('../middleware/hospitalMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Report category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter Category Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Description</label>
                                <input type="text" name="description" placeholder="Enter description" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>