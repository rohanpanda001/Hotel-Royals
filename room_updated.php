<?php
include "connect.php";
$room_no=$_POST["room_no"];
$type=$_POST["type"];
$av=$_POST["availability"];

if($type)
{
    $update="Update rooms SET Type='$type' where Room_no='$room_no'";
    $result=mysqli_query($conn,$update);
}
if($av)
{
    $update="Update rooms SET Availability='$av' where Room_no='$room_no'";
    $result=mysqli_query($conn,$update);
}

header("location:edit_room.php");

?>
