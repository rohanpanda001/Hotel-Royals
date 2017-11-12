<!DOCTYPE html>
<?php
    include "connect.php";
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location:index.html');
    }
    $id=$_SESSION['user'];
    $sql="Select * from user where ID ='$id'";
    $query=mysqli_query($conn,$sql);
    $profile=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <title>Hotel Royals</title>

    <!-- Bootstrap Core CSS --><link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS --><link href="css/agency.css" rel="stylesheet">
    <!-- Custom Fonts --><link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"	type="text/css">
    <link rel="stylesheet" href="css/date_input.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"	rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script'	rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic'	rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'	rel='stylesheet' type='text/css'>
    <script type="text/javascript"	src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.date_input.js"></script>
    <script type="text/javascript">	$($.date_input.initialize);</script>
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
                            login_pass: {
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

<body id="page-top" class="index">

<!-- Navigation -->
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
            <a class="navbar-brand page-scroll" href="profile.php">Hotel
                Royals </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse"
             id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden"><a href="#page-top"></a></li>
                <li><a class="page-scroll" href="#page-top">Home</a></li>
                <li><a class="page-scroll" href="#portfolio">Gallery</a></li>
                <li><a class="page-scroll" href="#about">About Us</a></li>
                <li><a class="page-scroll" href="#contact">Contact</a></li>
                <li><a href="logout.php" class="btn btn-primary"> Logout</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome, <?php echo $profile['Name']; ?>!</div>
            <div class="intro-heading">
                <form action="search.php" method="post" name="Search_Rooms">
                    <p>
                        <input type="text" name="check_in" class="date_input"
                               id="check-in" readonly="readonly" required="required"
                               placeholder="Check In" style="color: #a9a9a9">
                        <input type="text" name="check_out" class="date_input" id="check-out"
                               readonly="readonly" required="required" placeholder="Check_Out"
                               style="color: #a9a9a9">
                    </p>
                    <input type="submit" class="page-scroll btn btn-xl" name="Search_Rooms" />
                </form>
                <a class="btn btn-warning btn-lg" href="bookings.php">See Booking History</a>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio Grid Section -->
<section id="portfolio" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Gallery</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor
                    sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-5 portfolio-item">
                <a href="#portfolioModal1" class="portfolio-link"
                   data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div> <img src="img/portfolio/bedroom.jpg" class="img-responsive"
                                alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Bedroom</h4>
                    <p class="text-muted">Royal style</p>
                </div>

            </div>
            <div class="col-md-3 col-sm-5 portfolio-item">
                <a href="#portfolioModal2" class="portfolio-link"
                   data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div> <img src="img/portfolio/balcony.jpg" class="img-responsive"
                                alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Balcony</h4>
                    <p class="text-muted">Open like Heaven</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-5 portfolio-item">
                <a href="#portfolioModal3" class="portfolio-link"
                   data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div> <img src="img/portfolio/gym1.jpeg" class="img-responsive" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Gym</h4>
                    <p class="text-muted">A place for fitness</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-5 portfolio-item">
                <a href="#portfolioModal4" class="portfolio-link"
                   data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div> <img src="img/portfolio/tennis.jpg" class="img-responsive" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Tennis Court</h4>
                    <p class="text-muted">Game Play</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-5 portfolio-item">
                <a href="#portfolioModal5" class="portfolio-link"
                   data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div> <img src="img/portfolio/swimmingpool.jpg" class="img-responsive"
                                alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Swimming Pool</h4>
                    <p class="text-muted">Experience the Ocean</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-5 portfolio-item">
                <a href="#portfolioModal6" class="portfolio-link"
                   data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div> <img src="img/portfolio/garden.jpg" class="img-responsive" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Garden</h4>
                    <p class="text-muted">Feel like Jungle</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Team Section -->
<!--<section id="team" class="bg-light-gray">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col-sm-4">-->
<!--                <div class="team-member">-->
<!--                    <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">-->
<!--                    <h4>Kay Garland</h4>-->
<!--                    <p class="text-muted">Lead Designer</p>-->
<!--                    <ul class="list-inline social-buttons">-->
<!--                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-4">-->
<!--                <div class="team-member">-->
<!--                    <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">-->
<!--                    <h4>Larry Parker</h4>-->
<!--                    <p class="text-muted">Lead Marketer</p>-->
<!--                    <ul class="list-inline social-buttons">-->
<!--                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-4">-->
<!--                <div class="team-member">-->
<!--                    <img src="img/team/3.jpg" class="img-responsive img-circle" alt="">-->
<!--                    <h4>Diana Pertersen</h4>-->
<!--                    <p class="text-muted">Lead Developer</p>-->
<!--                    <ul class="list-inline social-buttons">-->
<!--                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-lg-8 col-lg-offset-2 text-center">-->
<!--                <p class="large text-muted">Lorem ipsum dolor sit amet,-->
<!--                    consectetur adipisicing elit. Aut eaque, laboriosam veritatis,-->
<!--                    quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section> -->
<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">About</h2>
                <h3 class="section-subheading text-muted">Our goal is to
                    change the way people stay away from home.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/1.jpg"
                                 alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">

                                <h4 class="subheading">Standardized</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Hotel ROYALS promises to provide the
                                    same amenities and the same awesome experience across all its
                                    rooms.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/2.jpg"
                                 alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">

                                <h4 class="subheading">Affordable</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Hotel ROYALS rooms at prices that no
                                    other player in the budget segment offers today.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/3.jpg"
                                 alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2016</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Content to be Edited</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/4.jpg"
                                 alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>February 2017</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Content to be Edited</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part <br>Of Our <br>Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Clients Aside -->
<aside class="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <a href="#"> <img src="img/logos/envato.jpg"
                                  class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#"> <img src="img/logos/designmodo.jpg"
                                  class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#"> <img src="img/logos/themeforest.jpg"
                                  class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#"> <img src="img/logos/creative-market.jpg"
                                  class="img-responsive img-centered" alt="">
                </a>
            </div>
        </div>
    </div>
</aside>
<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contact Us</h2>
                <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor-->
                <!--sit amet consectetur.</h3>-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="contact.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact_name"
                                       placeholder="Your Name *" id="name" required
                                       data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="contact_email"
                                       placeholder="Your Email *" id="email" required
                                       data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact_mobile"
                                       placeholder="Your Phone *" id="phone" required
                                       data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
									<textarea class="form-control" placeholder="Your Message *"
                                              id="message" required name="contact_msg"
                                              data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; My Website 2017</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio Modals -->
<!-- Use the modals below to showcase details about your portfolio projects! -->

<!-- Portfolio Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1"
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
                        <img src="img/portfolio/bedroom.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 2 -->
<div class="portfolio-modal modal fade" id="portfolioModal2"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 3 -->
<div class="portfolio-modal modal fade" id="portfolioModal3"
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
                        <img src="img/portfolio/gym1.jpeg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 4 -->
<div class="portfolio-modal modal fade" id="portfolioModal4"
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
                        <img src="img/portfolio/tennis.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 5 -->
<div class="portfolio-modal modal fade" id="portfolioModal5"
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
                        <img src="img/portfolio/swimmingpool.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 6 -->
<div class="portfolio-modal modal fade" id="portfolioModal6"
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
                        <img src="img/portfolio/garden.jpg" class="img-responsive">
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
        var x=window.location.search.substring(1),y;
        if(x)
        {
            y=x.split('=');
            if(y[0]=='not_found')
                alert("Sorry, No Rooms Found!!");
            else if(y[0]=='email')
                    alert("Confirmation sent");
                else if(y[0]=='contact')
                        alert("Your Messsage has been sent!");
                    else if(y[0]=='invalid')
                            alert("Invalid Query!");
        }
    </script>
</body>

</html>
