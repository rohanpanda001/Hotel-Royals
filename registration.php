<html>
<head>
    <title>Hotel Royal</title>
</head>
<body>

<?php

    include ("connect.php");
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mob=$_POST["mobile"];
    $pass=$_POST["password"];

    
    $sql="INSERT INTO user (Name,Email,Mobile,Password) VALUES ('$name','$email','$mob','$pass')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {

        header('location:index.html?registered=true');
    }
    else
        echo "Not Inserted". "<br>" . mysqli_error($conn);

?>

</body>
</html>

