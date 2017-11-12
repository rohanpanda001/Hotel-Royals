<html>
<head>
    <title>Hotel Royal</title>
</head>
<body>

<?php

include ("connect.php");
session_start();
$name=$_POST["contact_name"];
$email=$_POST["contact_email"];
$mob=$_POST["contact_mobile"];
$msg=$_POST["contact_msg"];

$sql="INSERT INTO contact_us (Name, Email, Mobile, Message) VALUES ('$name','$email','$mob','$msg')";
$result=mysqli_query($conn,$sql);
if($result)
{
    if(isset($_SESSION['user']))
        header('location:profile.php?contact=true');
    else
        header('location:index.html?contact=true');
}
else
    echo "Not Inserted". "<br>" . mysqli_error($conn);

?>

</body>
</html>

