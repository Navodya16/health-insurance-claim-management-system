<?php 

include('../middleware/hospitalMiddleware.php');
include('includes/header.php');
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add report</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" required name="name" placeholder="Enter Report Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Select Report Category</label>
                                <select name="category_id" class="form-select" >
                                <option selected>Select Category</option>
                                    <?php
                                        if(isset($_SESSION['auth']))
                                        {
                                            $hospitalID = $_SESSION['auth_user']['userid'];
                                        }
                                        //$categories = getAll("reportcat"); 
                                        $categories = getByHospitalId("reportcat", $hospitalID);
                                        if(mysqli_num_rows($categories) > 0)
                                        {
                                            foreach($categories as $item)
                                            {
                                                ?>
                                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Category available!";
                                        } 
                                    ?>    
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" required name="description" placeholder="Enter description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Price</label>
                                <input type="text" required name="price" placeholder="Enter price" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_report_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>