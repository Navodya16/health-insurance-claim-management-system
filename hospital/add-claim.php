<?php 

include('../middleware/hospitalMiddleware.php');
include('includes/header.php');

// if(isset($_GET['value']))
// {
//     $totalPrice = $_GET['value'];
// }
// else
// {
//     $totalPrice = 0;
// }

if(isset($_GET['id']))
{
    $patientid = $_GET['id'];
}

//echo $totalPrice;
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Patient claim</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Add Patient Claim Description</label>
                                <textarea rows="3" required name="description" placeholder="Enter Patient description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Select documents of the patient</label>
                                <!-- <input type="file" name="doc[]" placeholder="Enter files of the patient" class="form-control" multiple><br><br> -->
                                <input type="file" name="pdf[]" placeholder="Enter documents of the patient" class="form-control" accept=".pdf" multiple><br><br>
                            </div>
                            <input type="hidden" name="id" value="<?= $patientid; ?>">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_patient_claim">Select Reports</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>