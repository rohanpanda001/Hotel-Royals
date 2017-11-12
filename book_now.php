<?php
    include "connect.php";
    session_start();
    $type=$_GET['type'];
    $price = $_SESSION['price'];
    $check_in = date("Y/m/d", strtotime($_SESSION['check_in']));
    $check_out = date("Y/m/d", strtotime($_SESSION['check_out']));

    // find out available rooms for this type
    $sql="Select Room_No from rooms WHERE Type = '$type' and Availability = 'Yes' LIMIT 1";
    $query=mysqli_query($conn,$sql);
    $found=mysqli_num_rows($query);
    if(!$found)
    {
        $sql="Select r.Room_No from rooms r
              where r.Type = '$type' and r.Room_no NOT in
              (Select Room_No from bookings b
              WHERE ('$check_in' >= b.check_in and '$check_in' <= b.check_out)
              OR ('$check_out' >= b.check_in and '$check_out' <= b.check_out)
              OR ('$check_in' < b.check_in and '$check_out' > b.check_out)
              )";
        $query=mysqli_query($conn,$sql);
//        $found=mysqli_num_rows($query);
    }
    $room=mysqli_fetch_array($query,MYSQLI_ASSOC);
//    var_dump($room);
    if($room)
        $room_no = $room['Room_No'];
    else
    {
        // when no rooms found
//        echo '<script>alert("Sorry, No Rooms found!!");</script>';
        header('location:profile.php?not_found=true');
    }

    // find user details using id
    $id=$_SESSION['user'];
    $sql="Select * from user where ID ='$id'";
    $query=mysqli_query($conn,$sql);
    $profile=mysqli_fetch_array($query,MYSQLI_ASSOC);
    $name=$profile['Name'];
    $mob=$profile['Mobile'];
    $date=date('Y/m/d');
    // var_dump($date);

    // book the room
    $sql="INSERT INTO bookings (Name, user_id, Mobile, Room_No, Price, check_in, check_out,booking_date)
          VALUES ('$name','$id', '$mob','$room_no','$price', '$check_in', '$check_out','$date')";
    $query=mysqli_query($conn,$sql);
    if(!$query)
            echo "Not Inserted". "<br>" . mysqli_error($conn);

    // update the room settings
    $sql="UPDATE rooms SET Availability = 'No'
          WHERE Room_No= '$room_no'";
    $query=mysqli_query($conn,$sql);
    if(!$query)
            echo "Not Updated". "<br>" . mysqli_error($conn);

    echo '<script>alert("Room Booked");</script>';

?>
<html>
<head>
    <title>Hotel Royal</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/agency.css" rel="stylesheet">
    <link href="css/ticket.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"	rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script'	rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'	rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<!--<style>-->
<!--    body {-->
<!--        background-image: url("img/hotel-room-suite-room.jpg");-->
<!--        background-repeat: no-repeat;-->
<!--        background-size: cover;-->
<!--    }-->
<!--</style>-->

<body>
    <script>
//        $(document).ready(function() {
//            alert("Room Booked");
//        });
    </script>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="profile.php">Hotel Royals </a>
            </div>


            <div class="collapse navbar-collapse"
                 id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
<!--                    <li><a href="profile.php" class="page-scroll" style="color: red"> Book Another Room</a></li>-->
                    <li><a href="logout.php" class="btn btn-primary"> Logout</a></li>
                </ul>
            </div>

        </div>
    </nav>

    <section id="portfolio" style="height:120%">
        <div id="container">
            <fieldset id="movies_booked">
                <legend><h3>Booking Details</h3></legend>
                <h4 style="color: #2e99ff">Hotel Royals</h4>
                <p>
                    <label>NAME:</label>
                    <span id="name"><?php echo $name; ?></span>
                </p>
                <p>
                    <label>PHONE:</label>
                    <span id="phone"><?php echo $mob; ?></span>
                </p>
<!--                <hr>-->
                <p>
                    <label>Room No:</label>
                    <span id="room_no"><?php echo $room_no; ?></span>
                </p>
                <p>
                    <label>PRICE:</label>
                    <span id="price"><?php echo $price; ?></span>
                </p>
                <p>
                    <label>Check IN:</label>
                    <span id="check_in"><?php echo $_SESSION['check_in']; ?></span>
                </p>
                <p>
                    <label>Check OUT:</label>
                    <span id="check_out"><?php echo $_SESSION['check_out']; ?></span>
                </p>
            </fieldset>
            <div style="position:absolute; top:80%; left:47%">
                <a href="javascript:window.print()" style="color: black">Print this Page</a>
            </div>
        </div>



    </section>

</body>
</html>