<?php

//session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['approve_claim_btn']))
{
    $claimid = $_POST['claimid'];
    $price = $_POST['totalPrice'];

    $update_status_query = "UPDATE claims SET status='Approved' WHERE id='$claimid'";

    $update_status_query_run = mysqli_query($con, $update_status_query);
    if($update_status_query_run)
    {
        redirect("stripet.php?id=".$claimid."&price=".$price."", "Claim approved successfully");
    }
    else
    {
        redirect("claims.php", "Something went wrong");
    }

}
else if(isset($_POST['reject_claim_btn']))
{
    $claimid = $_POST['claimid'];
    $price = $_POST['totalPrice'];

    $update_status_query = "UPDATE claims SET status='Rejected' WHERE id='$claimid'";

    $update_status_query_run = mysqli_query($con, $update_status_query);
    if($update_status_query_run)
    {
        redirect("claims.php", "Claim rejected successfully");
    }
    else
    {
        redirect("claims.php", "Something went wrong");
    }

}
else
{
    header('Location: ../index.php');
}


?>