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
                    $report = getById("reports", $id);
                    
                    if(mysqli_num_rows($report)>0)
                    {
                        $data = mysqli_fetch_array($report);
                        ?>
                            <div class="card">
                                    <div class="card-header">
                                        <h4>Edit report
                                            <a href="reports.php" class="btn btn-primary float-end">Back</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Name</label>
                                                    <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Report Name" class="form-control">
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
                                                            $categories = getByHospitalId("reportcat", $hospitalID);
                                                            //$categories = getAll("reportcat"); 
                                                            if(mysqli_num_rows($categories) > 0)
                                                            {
                                                                foreach($categories as $item)
                                                                {
                                                                    ?>
                                                                        <option value="<?= $item['id']; ?>" <?= $data['category_id']==$item['id']?'selected':'' ?> ><?= $item['name']; ?></option>
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
                                                <input type="hidden" name="report_id" value="<?= $data['id']; ?>">
                                                <div class="col-md-12">
                                                    <label for="">Description</label>
                                                    <textarea rows="3" required name="description" placeholder="Enter description" class="form-control"><?= $data['description']; ?>"</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Price</label>
                                                    <input type="text" required name="price" value="<?= $data['price']; ?>" placeholder="Enter price" class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary" name="update_report_btn">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        echo "Product Not Found for given id!";
                    }
                }
                else
                {
                    echo "Id missing from the url";
                }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>