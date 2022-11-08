<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
              <!-- <h4>welcome to insurance dashboard</h4> -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total registered hospitals</p>
                <?php
                  $count = "select * from users where userType= '1'";
                  $count_query = mysqli_query($con, $count);
                  $x = mysqli_num_rows($count_query);
                ?>
                <h4 class="mb-0"><?= $x ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total registered insurance companies</p>
                <?php
                  $count = "select * from users where userType= '3'";
                  $count_query = mysqli_query($con, $count);
                  $x = mysqli_num_rows($count_query);
                ?>
                <h4 class="mb-0"><?= $x ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
            </div>
          </div>
        </div>
        <!-- <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Sales</p>
                <h4 class="mb-0">$103,430</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div> -->
      </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>