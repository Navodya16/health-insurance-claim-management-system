<?php
include('../config/stripeconfig.php');
include('../functions/myfunctions.php');

\Stripe\Stripe::setVerifySslCerts(false);

$token = $_POST['stripeToken'];
$price  = $_POST['claim_price'];
$claimid = $_POST['claim_id'];

$data = \Stripe\Charge::create(array(
    "amount"=>$price,
    "currency"=>"usd",
    "description"=>"medi save insurance desc",
    "source"=>$token
));

//echo "<pre>";
//print_r($data);

if($data)
{
    $update_paid_query = "UPDATE claims SET paid='Yes' WHERE id='$claimid'";

    $update_paid_query_run = mysqli_query($con, $update_paid_query);

    if($update_paid_query_run)
    {
        redirect("claims.php", "Claim paid successfully");
    }
    else
    {
        redirect("claims.php", "Something went wrong");
    }
}

?>