<?php 
session_start();
include('config/dbcon.php');

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in!";
    header('Location: index.php');
    exit();
}

include('includes/header.php'); 
?>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if(isset($_SESSION['message'])) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Register Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="functions/authcode.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1"class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm password" id="exampleInputPassword1">
                                </div>
                                <?php
                                    if(isset($_GET['id']))
                                    {
                                        $id = $_GET['id'];
                                    }
                                    if($id=='1') //hospital
                                    {
                                        ?>
                                        <div class="mb-3">
                                            <label class="form-label">Enter the Hospital ID</label>
                                            <input type="text" name="userid" class="form-control" placeholder="Enter the valid hospital id" id="exampleInputuserid1">
                                        </div>
                                        <?php
                                    }
                                    else if($id == '2') //customer
                                    {
                                        ?>
                                        <div class="mb-3">
                                            <label class="form-label">Enter the NIC</label>
                                            <input type="text" name="userid" class="form-control" placeholder="Enter your NIC number (123456789V)" id="exampleInputuserid1">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Select the Insurance Company</label>
                                            <select name="insurance_id" class="form-select">
                                                <?php
                                                $check_ins = "SELECT * from users where userType ='3' ";
                                                $check_ins_query_run = mysqli_query($con, $check_ins);
                                                if(mysqli_num_rows($check_ins_query_run) > 0)
                                                {
                                                    foreach($check_ins_query_run as $item)
                                                    {
                                                        ?>
                                                            <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                    }
                                    else if($id=='3') //insurance
                                    {
                                        ?>
                                        <div class="mb-3">
                                            <label class="form-label">Enter the Insurance Company ID</label>
                                            <input type="text" name="userid" class="form-control" placeholder="Enter the valid insurance company id" id="exampleInputuserid1">
                                        </div>
                                        <?php
                                    }
                                ?>
                                
                                
                                <!-- <div class="mb-3">
                                    <label class="form-label">Enter the Insurance ID/Hospital ID/NIC</label>
                                    <input type="text" name="userid" class="form-control" placeholder="Enter the valid insurance id or hospital id" id="exampleInputuserid1">
                                </div> -->
                                <input type="hidden" name="userType" value="<?= $id; ?>">
                                <!-- <div class="mb-3">
                                    <label class="form-label">Select the User Type</label>
                                    <select name="userType" class="form-select" aria-label="Default select example">
                                        <option value="1">Hospital</option>
                                        <option value="2">Customer/Patient</option>
                                        <option value="3">Insurance Company</option>
                                    </select>
                                </div> -->
                                <button type="submit" name="register-btn" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    
<?php include('includes/footer.php'); ?>