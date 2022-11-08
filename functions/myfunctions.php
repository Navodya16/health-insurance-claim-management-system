<?php

session_start();
include('../config/dbcon.php');

//select all rows of the table
function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

//select all rows match with id
function getById($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

//select all reports of particular claim id
function getByClaimId($table, $claimId)
{
    global $con;
    $query = "SELECT * FROM $table WHERE claim_id='$claimId' ";
    return $query_run = mysqli_query($con, $query);
}

//select all records matches with hospital_id
function getByHospitalId($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE hospital_id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

//get report name
function getReportName($table, $id)
{
    global $con;
    $query = "SELECT name FROM $table WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);
    $name = mysqli_fetch_array($query_run);
    return $name[0];
}

//get report price
function getReportPrice($table, $id)
{
    global $con;
    $query = "SELECT price FROM $table WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);
    $price = mysqli_fetch_array($query_run);
    return $price[0];
}

//select all records matches with username
function getUserName($table, $id)
{
    global $con;
    $query = "SELECT name FROM $table WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);
    $name = mysqli_fetch_array($query_run);
    return $name[0];
}

//get claim's status
function getStatus($table, $id)
{
    global $con;
    $query = "SELECT status FROM $table WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);
    $name = mysqli_fetch_array($query_run);
    return $name[0];
}

//get claim's paid or not
function getPaid($table, $id)
{
    global $con;
    $query = "SELECT paid FROM $table WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);
    $name = mysqli_fetch_array($query_run);
    return $name[0];
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>