<?php

session_start();

include('../config/dbcon.php');
include('myfunctions.php');

if(isset($_POST['register-btn'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    // $password = mysqli_real_escape_string($con, $_POST['password']);
    // $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $userid = mysqli_real_escape_string($con, $_POST['userid']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $userType = $_POST['userType'];
    if($userType=='2') //if an customer
    {
        $insurance_id = $_POST['insurance_id'];
    }

    //check if email already registered
    $check_email_query = "SELECT email from users where email ='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0 )
    {
        redirect("../register.php?id=$userType", "Email already registered");
    }
    else
    {
        if($password == $cpassword){
            //check if the user is registered by the admin
            $registered = 0;
            if($userType == '1') //if a hospital
            {
                $check_userid_query = "SELECT id from hospitals where id ='$userid'";
                $check_userid_query_run = mysqli_query($con, $check_userid_query);
                if(mysqli_num_rows($check_userid_query_run) > 0 )
                {
                    $registered = 1;
                }
            }
            else if($userType == '2') //if a patient
            {
                if(strlen($userid)==10) //if the length of id number is 10
                {
                    if(strpos($userid, "V") == 9) //if last character is "V"
                    {
                        $numb = substr($userid, 0, 9);
                        if(is_numeric($numb)==true) //if the rest are all numbers
                        {
                            $registered = 1;
                        }
                    }
                }

                $add_customer_query = "INSERT INTO customers (id, name, email, insurance_id) VALUES ('$userid', '$name', '$email', '$insurance_id')";
                $add_customer_query_run = mysqli_query($con, $add_customer_query);
                // $check_userid_query = "SELECT id from customers where id ='$userid'";
                // $check_userid_query_run = mysqli_query($con, $check_userid_query);
                // if(mysqli_num_rows($check_userid_query_run) > 0 )
                // {
                //     $registered = 1;
                // }
            }
            else if($userType == '3') //if a insurance company
            {
                $check_userid_query = "SELECT id from insurance where id ='$userid'";
                $check_userid_query_run = mysqli_query($con, $check_userid_query);
                if(mysqli_num_rows($check_userid_query_run) > 0 )
                {
                    $registered = 1;
                }
            }
            if($registered==1) //if the user is registered before by the admin or the nic is valid
            {
                //check if the user registered from another email before
                $check_repetitive_data = "SELECT * from users where userType ='$userType' AND userid='$userid' ";
                $check_repetitive_data_query_run = mysqli_query($con, $check_repetitive_data);
                if(mysqli_num_rows($check_repetitive_data_query_run) > 0 )
                {
                    redirect("../register.php?id=$userType", "You are already regitered to the system before. Please login with your credentials");
                }
                else
                {
                    //insert user data to the users table
                    $insert_query = "INSERT INTO users (name, email, password, userType, userid) VALUES ('$name', '$email', '$password', '$userType', '$userid')";
                    $insert_query_run = mysqli_query($con, $insert_query);
            
                    if($insert_query_run){
                        redirect("../login.php", "Registered Successfully");
                    }else{
                        redirect("../register.php?id=$userType", "Something went wrong");
                    }
                }
                
            }
            else
            {
                redirect("../register.php?id=$userType", "Your hospital ID/Insurance ID/NIC is not registered or valid. Enter a valid ID.");
            }
        }else{
            redirect("../register.php?id=$userType", "Passwords do not match");
        }
    }

    
}
else if(isset($_POST['login-btn'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5($_POST['password']);
    // $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "select * from users where email='$email' and password = '$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $userType = $userdata['userType'];
        $userId = $userdata['id'];

        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail,
            'userid' => $userId,
            'userType' => $userType
        ];

        $_SESSION['type'] = $userType;  

        if($userType == '0')
        {
            redirect("../admin/index.php", "Welcome to dashboard");
        }
        else if($userType == '1')
        {
            redirect("../hospital/index.php", "Welcome to dashboard");
        }
        else if($userType == '2')
        {
            redirect("../customer/index.php", "Welcome to dashboard");
        }
        else if($userType == '3')
        {
            redirect("../insurance/index.php", "Welcome to dashboard");
        }
        else
        {
            redirect("../index.php", "Logged In Successfully");
        }
    }
    else{
        redirect("../login.php", "Invalid Credentials");
    }
}

?>