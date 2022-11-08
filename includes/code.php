<?php

include('../functions/myfunctions.php');

if($_SESSION['type'] == '0')
{
    redirect("../admin/index.php", "Welcome to dashboard");
}
else if($_SESSION['type'] == '1')
{
    redirect("../hospital/index.php", "Welcome to dashboard");
}
else if($_SESSION['type'] == '2')
{
    redirect("../customer/index.php", "welcome to dashboard");
}
else if($_SESSION['type'] == '3')
{
    redirect("../insurance/index.php", "welcome to dashboard");
}
 


?>