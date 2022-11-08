<?php

//session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['delete_hospital_btn']))
{
    $hospital_id = mysqli_real_escape_string($con, $_POST['hospital_id']);

    $delete_query = "DELETE FROM users WHERE id='$hospital_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        //redirect("category.php", "Category deleted successfully");
        echo 200;
    }
    else
    {
        //redirect("category.php", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['delete_insurance_btn']))
{
    $insurance_id = mysqli_real_escape_string($con, $_POST['insurance_id']);
    echo $insurance_id;

    $checkClaimquery = "SELECT * FROM claims WHERE insurance_id='$insurance_id' ";
    $checkClaimquery_run = mysqli_query($con, $checkClaimquery);
    if(mysqli_num_rows($checkClaimquery_run) > 0)
    {
        // $delete_query = "DELETE users , claims FROM users INNER JOIN claims WHERE users.id=claims.patient_id AND users.id='$patient_id' ";
        $delete_query = "DELETE FROM users WHERE id='$insurance_id'";
    }
    else
    {
        $delete_query = "DELETE FROM users WHERE id='$insurance_id'";
    } 

    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        //redirect("patients.php", "Patient deleted successfully");
        echo 200;
    }
    else
    {
        //redirect("patients.php", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['add_insurance_btn']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $insurance_id = mysqli_real_escape_string($con, $_POST['insurance_id']);

    //check if email already registered
    $check_email_query = "SELECT email from insurance where email ='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0 )
    {
        redirect("add-insurance.php", "Email already registered");
    }
    else
    {
        //check if insurance id already registered
        $check_id_query = "SELECT id from insurance where id ='$insurance_id'";
        $check_id_query_run = mysqli_query($con, $check_id_query);

        if(mysqli_num_rows($check_id_query_run) > 0 ){
            redirect("add-insurance.php", "Insurance ID already registered");
        }else{
            //insert user data
            $insert_query = "INSERT INTO insurance (id, name, email) VALUES ('$insurance_id', '$name', '$email')";
            $insert_query_run = mysqli_query($con, $insert_query);
    
            if($insert_query_run){
                redirect("add-insurance.php", "Entered data Successfully");
            }else{
                redirect("add-insurance.php", "Something went wrong");
            }
        }
    }
}
else if(isset($_POST['add_hospital_btn']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $hospital_id = mysqli_real_escape_string($con, $_POST['hospital_id']);

    //check if email already registered
    $check_email_query = "SELECT email from hospitals where email ='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0 )
    {
        redirect("add-hospital.php", "Email already registered");
    }
    else
    {
        //check if hsopital id already registered
        $check_id_query = "SELECT id from hospitals where id ='$hospital_id'";
        $check_id_query_run = mysqli_query($con, $check_id_query);

        if(mysqli_num_rows($check_id_query_run) > 0 ){
            redirect("add-hospital.php", "Hospital ID already registered");
        }else{
            //insert user data
            $insert_query = "INSERT INTO hospitals (id, name, email) VALUES ('$hospital_id', '$name', '$email')";
            $insert_query_run = mysqli_query($con, $insert_query);
    
            if($insert_query_run){
                redirect("add-hospital.php", "Entered data Successfully");
            }else{
                redirect("add-hospital.php", "Something went wrong");
            }
        }
    }
}
else
{
    header('Location: ../index.php');
}

?>