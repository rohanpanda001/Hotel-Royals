<html>
<head>
    <title>Hotel Royal</title>

    <!-- Bootstrap Core CSS --><link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS --><link href="css/agency.css" rel="stylesheet">
    <!-- Custom Fonts --><link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"	type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"	rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script'	rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic'	rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'	rel='stylesheet' type='text/css'>
    <script type="text/javascript"	src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
    
</head>
<style>
    body {
        background-image: url("img/room.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    .boxed {
        border: 1px solid #a1cb2f ;
        border-radius: 20px;
        border-width: thick;
        background-color: white;
        padding: 30px;
        margin: 20px;
        height: 100%;
        /*width: 100%;*/
    }
</style>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="profile.php">Hotel Royals </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse"
             id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                    session_start();
                    include "connect.php";
                    $id=$_SESSION['user'];
                    $sql="Select * from user where ID ='$id'";
                    $query=mysqli_query($conn,$sql);
                    $profile=mysqli_fetch_array($query,MYSQLI_ASSOC);
                    if(isset($_SESSION['user']))
                    {
                        ?>
                        <li><a class="page-scroll" href="profile.php">Welcome <?php echo $profile['Name']; ?></a></li>
                        <li><a href="logout.php" class="btn btn-primary"> Logout</a></li>
                        <?php
                    } else {
                        ?>
                        <li><a class="btn btn-primary" data-toggle="modal"
						data-target="#myModal"> Login/SignUP</a></li>
                        <?php
                    }
                ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<section id="portfolio" style="height: 100%">
    <div class="container" >
        <div class="boxed">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Booking History:-</h2>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3 col-sm-5 ">
                <table align="center" style="width:70%;position: fixed; left: 15%;" border="2">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Room No</th>
                        <th>Price</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Booking Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        $name=$profile['Name'];
                        $sql="Select * from bookings where user_id='$id'";
                        $result=mysqli_query($conn,$sql);
                        while($found=mysqli_fetch_array($result,MYSQLI_ASSOC))
                        {
                            ?>
                            <tr>
                                <td><?php echo $found['Name']; ?></td>
                                <td><?php echo $found['Mobile']; ?></td>
                                <td><?php echo $found['Room_No']; ?></td>
                                <td><?php echo $found['Price']; ?></td>
                                <td><?php echo $found['check_in']; ?></td>
                                <td><?php echo $found['check_out']; ?></td>
                                <td><?php echo $found['booking_date']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>

    </div>
</section>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script
    src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/agency.js"></script>

<script>
    $('.standard, .deluxe').click(function() {
        var login = "<?php echo $id ?>";
        if(login)
        {
            if($(this).attr('type')=='standard')
                window.location="book_now.php?type=standard";
            else
                window.location="book_now.php?type=deluxe";
        }
        else
        {
            alert("You need to login first..");
            $('#myModal').modal('show');
        }

    });
</script>

</body>
</html>