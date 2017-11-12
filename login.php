<?php

include "connect.php";
session_start();

$email = $_POST['login_email'];
$pass = $_POST['login_pass'];

if($email == "admin@admin.com" and $pass == "admin")
{
//    $_SESSION['user']="Admin";
    header("location:adminpage.php");
}else {
    $sql="Select * from user where Email='$email' and Password='$pass'";
    $query=mysqli_query($conn,$sql);
    $found=mysqli_num_rows($query);
    $profile=mysqli_fetch_array($query,MYSQLI_ASSOC);
    if($found)
    {
        $_SESSION['user']=$profile['ID'];
        header("location:profile.php");
    }
    else
    {
        ?>
        <h2 class="form-signin-heading" style="position:fixed; left:40%;">Invalid UserName or Password</h2>
        <?php
    }
}

?>