<?php 
session_start();

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in!";
    header('Location: index.php');
    exit();
}

include('includes/header.php'); 
?>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<br><br>
<div style="text-align:center"><h1>SELECT YOUR USER TYPE</h1></div>
<br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-hospital-o" style="font-size:200px;"></i>
            <br><br>
            <a href="register.php?id=<?= 1; ?>" class="btn btn-sm btn-primary">HOSPITAL</a>  
        </div>
        <div class="col-md-4">
            <i class='far fa-building' style='font-size:200px'></i><br><br>
            <a href="register.php?id=<?= 3; ?>" class="btn btn-sm btn-primary">INSURANCE</a>
        </div>
        <div class="col-md-4">
        <i class='fas fa-user-alt' style='font-size:200px'></i><br><br>
            <a href="register.php?id=<?= 2; ?>" class="btn btn-sm btn-primary">CUSTOMER</a>
        </div>
    </div>               
</div>


