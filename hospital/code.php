<?php

//session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];

    if(isset($_SESSION['auth']))
    {
        $hospitalID = $_SESSION['auth_user']['userid'];
    }

    $category_query = "INSERT INTO reportcat (name,description,hospital_id) VALUES ('$name', '$description', '$hospitalID')";

    $category_query_run = mysqli_query($con, $category_query);

    if($category_query_run)
    {
        redirect("add-report-category.php", "Category added successfully");
    }
    else
    {
        redirect("add-report-category.php", "Something went wrong");
    }
}
else if(isset($_POST['update_category_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $update_query = "UPDATE reportcat SET name='$name', description='$description' WHERE id='$category_id'";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        redirect("edit-report-category.php?id=$category_id", "Category updated successfully");
    }
    else
    {
        redirect("edit-report-category.php?id=$category_id", "Something went wrong");
    }
}
else if(isset($_POST['delete_category_btn']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $delete_query = "DELETE FROM reportcat WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        // $delete_category_reports = "DELETE FROM reports WHERE category_id = '$category_id'";
        // $delete_category_reports_run = mysqli_query($con, $delete_category_reports);
        //redirect("category.php", "Category deleted successfully");
        echo 200;
    }
    else
    {
        //redirect("category.php", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['add_report_btn']))
{
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    if(isset($_SESSION['auth']))
    {
        $hospitalID = $_SESSION['auth_user']['userid'];
    }

    if($name != "" && $category_id != "" && $description != "" && $price != "")
    {
        $report_query = "INSERT INTO reports (category_id, name, description, price, hospital_id) VALUES ('$category_id', '$name', '$description', '$price', '$hospitalID') ";
        $report_query_run = mysqli_query($con, $report_query);

        if($report_query_run)
        {
            redirect("add-reports.php", "Report added successfully");
        }
        else
        {
            redirect("add-reports.php", "Something Went Wrong");
        }
    }
    else
    {
        redirect("add-reports.php", "All fields are mandatory");
    }
    
}
else if(isset($_POST['update_report_btn']))
{
    $reportId = $_POST['report_id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $update_report_query = "UPDATE reports SET category_id='$category_id', name='$name', description='$description', price='$price' WHERE id='$reportId' ";
    $update_report_query_run = mysqli_query($con, $update_report_query);

    if($update_report_query_run)
    {
        redirect("edit-report.php?id=$reportId", "Report updated successfully");
    }
    else
    {
        redirect("edit-report.php?id=$reportId", "Something went wrong");
    }
}
else if(isset($_POST['delete_report_btn']))
{
    $report_id = mysqli_real_escape_string($con, $_POST['report_id']);

    $delete_query = "DELETE FROM reports WHERE id='$report_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        //redirect("reports.php", "Report deleted successfully");
        echo 200;
    }
    else
    {
        //redirect("reports.php", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['add_patient_claim']))
{
    $patient_id = $_POST['id'];
    $description = $_POST['description'];
    if(isset($_SESSION['auth']))
    {
        $hospitalID = $_SESSION['auth_user']['userid'];
    }
    $insurance_id_query = "SELECT customers.insurance_id FROM customers INNER JOIN users ON users.userid=customers.id AND users.id='$patient_id' ";
    $insurance_id_query_run = mysqli_query($con, $insurance_id_query);
    $row = mysqli_fetch_array($insurance_id_query_run);
    $insurance_id = $row[0];

    
    $claim_query = "INSERT INTO claims (patient_id, description, hospital_id, insurance_id, status, paid) VALUES ('$patient_id', '$description', '$hospitalID', '$insurance_id', 'pending', 'no')";

    $claim_query_run = mysqli_query($con, $claim_query);

    if($claim_query_run)
    {
        $last_claim_id = mysqli_insert_id($con);
        foreach($_FILES['pdf']['name'] as $key=>$val)
        {
            //$random = rand('11111', '99999');
            //$file = $random.'_'.$val;
            $file = $val;
            move_uploaded_file($_FILES['pdf']['tmp_name'][$key],'../uploads/'.$file);

            $file_upload_query = "INSERT INTO files (claimId, file_source) VALUES ('$last_claim_id', '$file')";
            $file_upload_query_run = mysqli_query($con, $file_upload_query);

            if($file_upload_query_run)
            {
                echo "files uploaded successfully";
            }
            else
            {
                echo "failed";
            }
        }
        redirect("add-patient-claim.php?claimnumber=".$last_claim_id."", "select reports now");
    }
    else
    {
        redirect("add-claim.php?id=".$patient_id."", "Something went wrong");
    }

}
else if(isset($_POST['update_patient_claim']))
{
    $claimid = $_POST['claimid'];
    $price = $_POST['totalPrice'];
    //$totalreports = $_POST['totalReports'];
    $totalreports = $_POST['totalReports'];

    $update_claim_query = "UPDATE claims SET price='$price' WHERE id='$claimid'";
    //$update_claim_query = "UPDATE claims SET price='$price' WHERE id='$claimid'";

    $update_claim_query_run = mysqli_query($con, $update_claim_query);

    if($update_claim_query_run)
    {
        foreach($totalreports as $val)
        {
            //echo $val;
            $claim_report_query = "INSERT INTO claim_reports (claim_id, report_id) VALUES ('$claimid', '$val')";
            $claim_report_query_run = mysqli_query($con, $claim_report_query); 
        }
        unset($_SESSION['cart']);
        redirect("patients.php", "Claim added successfully");
    }
    else
    {
        redirect("patients.php", "Something went wrong");
    }
}
else
{
    header('Location: ../index.php');
}

?>