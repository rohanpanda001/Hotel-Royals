<?php
include "connect.php";
$room_no=$_POST["room_no"];
$type=$_POST["type"];
$av=$_POST["availability"];
//echo $av;
$sql="INSERT INTO rooms (Room_No, Type, Availability) VALUES ('$room_no','$type','$av')";

$result=mysqli_query($conn,$sql);

header("location:edit_room.php");

?>
