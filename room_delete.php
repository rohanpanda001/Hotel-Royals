<?php
include "connect.php";
$room_no=$_POST["room_no"];

$sql="DELETE from rooms WHERE Room_No = '$room_no'";

$result=mysqli_query($conn,$sql);

header("location:edit_room.php");

?>
