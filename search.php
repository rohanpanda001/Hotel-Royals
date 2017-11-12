<?php
    include "connect.php";
    session_start();
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $days=$check_out-$check_in;
    $_SESSION['check_in'] = $check_in;
    $_SESSION['check_out'] = $check_out;

    $in = date("Y/m/d", strtotime($check_in));
    // var_dump($in < date("Y/m/d"));

    if($check_out<$check_in || $in < date("Y/m/d"))
    {
        if(!isset($_SESSION['user'])) 
            header('location:index.html?invalid=true');
        else
            header("location:profile.php?invalid=true");
    }

    if(isset($_SESSION['user'])) {
        $id=$_SESSION['user'];
        $sql="Select * from user where ID ='$id'";
        $query=mysqli_query($conn,$sql);
        $profile=mysqli_fetch_array($query,MYSQLI_ASSOC);
    }
    else
        $id = null;

?>

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
    <!-- Validation  --><script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script>

        <!-- For Registration -->
        (function($,W,D)
        {
            var JQUERY4U = {};

            JQUERY4U.UTIL =
            {
                setupFormValidation: function()
                {
                    //form validation rules
                    $("#register-form2").validate({
                        rules: {
                            name: "required",
                            mobile: "required",
                            email: {
                                required: true,
                                email: true
                            },
                            password: {
                                required: true,
                                minlength: 5
                            },
                            agree: "required"
                        },
                        messages: {
                            name: "Please enter your Full Name",
                            mobile: "Please enter your Mobile Number",
                            password: {
                                required: "Please provide a Password",
                                minlength: "Your password must be at least 5 characters long"
                            },
                            email: "Please enter a valid Email Address",
                            agree: "Please accept our policy"
                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                }
            }

            //when the dom has loaded setup form validation rules
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation();
            });

        })(jQuery, window, document);

        <!-- For Login -->
        (function($,W,D)
        {
            var JQUERY4U = {};

            JQUERY4U.UTIL =
            {
                setupFormValidation: function()
                {
                    //form validation rules
                    $("#login_form").validate({
                        rules: {
                            login_email: {
                                required: true,
                                email: true
                            },
                            login_pass: {
                                required: true,
                                minlength: 5
                            }

                        },
                        messages: {
                            exampleInputPassword1: {
                                required: "Please provide a Password",
                                minlength: "Your password must be at least 5 characters long"
                            },
                            login_email: "Please enter a valid Email Address"

                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                }
            }

            //when the dom has loaded setup form validation rules
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation();
            });

        })(jQuery, window, document);
    </script>
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
                    <h2 class="section-heading">Which Type?</h2>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-3 col-sm-5 portfolio-item">
                    <a href="#standard" class="portfolio-link"
                       data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div> <img src="img/standard2.jpg" class="img-responsive"
                                    alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Standard</h4>
                        <p class="text-muted">Price: Rs.1000</p>
                        <p class="text-muted">(per day)</p>
                        <p class="text-muted">X <?php echo $days; ?> days</p>
                        <hr>
                        <p class="text-muted">Rs.<?php $_SESSION['price'] = $days*1000; echo $_SESSION['price']; ?></p>
                    </div>

                    <a class="btn btn-success standard" type='standard' style="padding-left: 75px; padding-right: 75px;">Book Now</a>
                </div> -->
                <div class="row">
                <div class="col-md-3 col-sm-5 portfolio-item">
                    <a href="#economy" class="portfolio-link"
                       data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div> <img src="img/standard2.jpg" class="img-responsive"
                                    alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Economy</h4>
                        <p class="text-muted">Price: Rs.1000</p>
                        <p class="text-muted">(per day)</p>
                        <p class="text-muted">X <?php echo $days; ?> days</p>
                        <hr>
                        <p class="text-muted">Rs.<?php $_SESSION['price'] = $days*1000; echo $_SESSION['price']; ?></p>
                    </div>

                    <a class="btn btn-success economy" type='economy' style="padding-left: 75px; padding-right: 75px;">Book Now</a>
                </div>
                <div class="row">
                <div class="col-md-3 col-sm-5 portfolio-item">
                    <a href="#buisness" class="portfolio-link"
                       data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div> <img src="img/buisness2.jpeg" class="img-responsive"
                                    alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Buisness</h4>
                        <p class="text-muted">Price: Rs.1500</p>
                        <p class="text-muted">(per day)</p>
                        <p class="text-muted">X <?php echo $days; ?> days</p>
                        <hr>
                        <p class="text-muted">Rs.<?php $_SESSION['price'] = $days*1500; echo $_SESSION['price']; ?></p>
                    </div>

                    <a class="btn btn-success buisness" type='buisness' style="padding-left: 75px; padding-right: 75px;">Book Now</a>
                </div>
                <div class="col-md-3 col-sm-5 portfolio-item">
                    <a href="#deluxe" class="portfolio-link"
                       data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div> <img src="img/portfolio/balcony.jpg" class="img-responsive"
                                    alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Deluxe</h4>
                        <p class="text-muted">Price: Rs.2000</p>
                        <p class="text-muted">(per day)</p>
                        <p class="text-muted">X <?php echo $days; ?> days</p>
                        <hr>
                        <p class="text-muted">Rs.<?php $_SESSION['price'] = $days*2000; echo $_SESSION['price']; ?></p>
                    </div>

                    <a class="btn btn-success deluxe" type='deluxe' style="padding-left: 75px; padding-right: 75px;">Book Now</a>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- Standard Modal -->
<!-- <div class="portfolio-modal modal fade" id="standard"
     tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <img src="img/standard2.jpg" class="img-responsive">
                        <img src="img/standard1.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Economy Modal -->
<div class="portfolio-modal modal fade" id="economy"
     tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <img src="img/standard2.jpg" class="img-responsive">
                        <img src="img/standard1.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Buisness Modal -->
<div class="portfolio-modal modal fade" id="buisness"
     tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <img src="img/buisness.jpg" class="img-responsive">
                        <img src="img/buisness2.jpeg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deluxe Modal -->
<div class="portfolio-modal modal fade" id="deluxe"
     tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <img src="img/portfolio/balcony.jpg" class="img-responsive">
                        <img src="img/deluxe1.jpg" class="img-responsive">
                        <img src="img/deluxe2.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login / Registration - <a href="http://www.jquery2dotnet.com"></a>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8"
                         style="border-right: 1px dotted #C2C2C2; padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <!-- log In  -->
                        <br>
                        <div class="tab-content">

                            <div class="tab-pane active" id="Login">
                                <form role="form" action="login.php" method="post" id="login_form" novalidate="novalidate">
                                    <div class="form-group">
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="email">Email</label>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <input type="text" name="login_email" class="form-control" placeholder="Enter your Email Address"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="password">Password</label>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <input type="password" name="login_pass" class="form-control" placeholder="Enter your Password"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-2">
                                                    <input type="submit" class="submit btn btn-md btn-success" value="Login"/>
                                                    <input type="hidden" name="action" value="Login"/>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <p>Forget Password? <a href="change_pass.html">Change It.</a>.</p>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                                </form>
                            </div>


                            <!-- Registration Tab -->

                            <div class="tab-pane" id="Registration">
                                <form role="form" action="registration.php" method="post" id="register-form2" novalidate="novalidate">
                                    <div id="form-content" class="form-group">
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="name">Full Name</label>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <input type="text" name="name" class="form-control" placeholder="Enter your Full Name"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="mobile">Mobile</label>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <input type="text" name="mobile" class="form-control" placeholder="Enter your Mobile Number"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="email">Email</label>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <input type="text" name="email" class="form-control" placeholder="Enter your Email Address"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="password">Password</label>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <input type="password" name="password" class="form-control" placeholder="Enter your Password"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <button type="submit" class="submit btn btn-md btn-success">Register</button>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
    $('.economy,.buisness, .deluxe').click(function() {
        var login = "<?php echo $id ?>";
        if(login)
        {
            if($(this).attr('type')=='economy')
                window.location="book_now.php?type=economy";
            else if($(this).attr('type')=='deluxe')
                window.location="book_now.php?type=deluxe";
            else
                window.location="book_now.php?type=buisness";
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