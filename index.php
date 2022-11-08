<?php 
session_start(); 
include('includes/header.php'); ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['message'])) 
                { 
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                }
                ?>

                <h1>WELCOME TO MEDI-SAVE INSURANCE</h1>
                <img src="https://www.usnews.com/object/image/0000017c-e0b1-dfe4-a77d-fef3754d0000/211102hckhnplans-stock.jpg?update-time=1635858623610&size=responsive970" alt="alternatetext"> 
                
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>
    