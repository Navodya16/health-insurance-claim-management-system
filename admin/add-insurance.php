<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add new insurance company</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter Name of the Insurance Company" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter the email address of the Insurance Company">
                            </div>
                            <div class="col-md-12">
                                <label for="">Insurance ID</label>
                                <input type="text" name="insurance_id" class="form-control" placeholder="Enter the id of the Insurance Company">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_insurance_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>