<?php include 'core/init.php' ?>
<?php include 'indexheader.php' ?>

<!DOCTYPE html>
    <!-- Pop-up box for forgotten password -->
    <div class="modal fade" id="forgottenPasswordModal" role="dialog">
        <div class="modal-dialog">

            <form id="forgotten_password_form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Forgotten Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Please enter your email address.</p>
                        <input style="width: 75%" id="user-login" name="email_address" type="email"
                               class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="forgotten_password_form_submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>


        </div>
    </div>


    <!-- Pop-up box for Login/Registration  -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Login or Register</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                                <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="Login">   <!-- The login tab is set as default -->

                                    <form id="login-form" role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label">
                                                Username</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" name="username1" id="username1"
                                                       placeholder="Username"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input required type="password" class="form-control" name="password1" id="password1"
                                                       placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                            </div>
                                            <div class="col-sm-10">
                                                <button type="submit" id="subm" class="btn btn-primary btn-sm">
                                                    Submit
                                                </button>
                                                <a style="cursor: pointer" id="forgot_password" ">Forgot your password?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="Registration">
                                    <form id="registration_form" class="form-horizontal">
                                        <div class="form-group">

                                            <div class="col-sm-10">
                                                <div style="margin-left: 130px;" class="row">

                                                    <div class="col-md-3">
                                                        <label style="width: 100%;text-align: center;" class="col-sm-2 control-label">
                                                            Title</label>
                                                        <select name="title" class="form-control">
                                                            <option>Mr</option>
                                                            <option>Miss</option>
                                                            <option>Mrs</option>
                                                            <option>Dr</option>
                                                            <option>Sir</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label style="width: 100%;text-align: center;" class="col-sm-2 control-label">
                                                            First Name</label>
                                                        <input name="first_name" placeholder="First Name" type="text" required id="first_name"
                                                               class="form-control"/>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label style="width: 100%;text-align: center;" class="col-sm-2 control-label">
                                                            Last Name</label>
                                                        <input type="text" required name="last_name" placeholder="Last Name" id="last_name"
                                                               class="form-control"/>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label style="width: 100%;text-align: center;" class="col-sm-2 control-label">
                                                            Birthday</label>
                                                        <input style="width: 170px" required class="form-control" type="date" id="dob" name="dob">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">
                                                Account Type</label>
                                            <div class="col-md-10">
                                                <select name="user_type" class="form-control">
                                                    <option value="host">Host</option>
                                                    <option value="participant">Participant</option>
                                                    <option value="both">Both</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">
                                                Email</label>
                                            <div class="col-sm-10">
                                                <input name="email_address" type="email" required class="form-control"
                                                       id="email" placeholder="Email"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" required class="col-sm-2 control-label">
                                                Username</label>
                                            <div class="col-sm-10">
                                                <input name="username" type="text" class="form-control" id="username"
                                                       placeholder="Username"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-2 control-label">
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input name="password" type="password" class="form-control"
                                                       id="password" placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="retype_password" class="col-sm-2 control-label">
                                                Retype Password</label>
                                            <div class="col-sm-10">
                                                <input name="retype_password" type="password" class="form-control"
                                                       id="retype_password" placeholder="Retype Password"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                            </div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    Save & Continue
                                                </button>
                                                <button type="button" class="btn btn-default btn-sm">
                                                    Cancel
                                                </button>
                                            </div>
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



    <!--Slider-->
    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
                <li>
                    <div class="slider-img slider-img1 ">
                    </div>
                    <div class="slider-info">

                        <h3>Great Music</h3>
                    </div>
                </li>
                <li>
                    <div class="slider-img slider-img2">

                    </div>
                    <div class="slider-info">

                        <h3>Easy bookings</h3>

                    </div>
                </li>
                <li>
                    <div class="slider-img slider-img3">

                    </div>
                    <div class="slider-info">

                        <h3>Fantastic Atmosphere</h3>
                    </div>
                </li>
                <li>
                    <div class="slider-img slider-img4">
                    </div>
                    <div class="slider-info">
                        <h3>Memories you won't forget</h3>

                    </div>
                </li>

            </ul>


<div class="main" id="main">
    <div class="w3layouts_main_grid">
        <div class="booking-form-head-agile">
            <h3>Event Search</h3>
        </div>
        <form action="search.php" id="search_form" method="post">
            <div class="agileits_w3layouts_main_grid w3ls_main_grid">

                <div>
                    <div class="col-md-3 agileinfo_grid ">
                        <h5>Price From*</h5>
                        <div class="agileits_w3layouts_main_gridl">
                            <select id="price_from" name="price_from" required="">
                                <option value="all">All</option>
                                <option value="1">£1</option>
                                <option value="5">£5</option>
                                <option value="10">£10</option>
                                <option value="15">£15</option>
                                <option value="20">£20</option>
                                <option value="30+">£30+</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 agileinfo_grid ">
                        <h5>Price To*</h5>
                        <div class="agileits_w3layouts_main_gridl">
                            <select id="price_to" name="price_to" required="">
                                <option value="all">All</option>
                                <option value="1">£1</option>
                                <option value="5">£5</option>
                                <option value="10">£10</option>
                                <option value="15">£15</option>
                                <option value="20">£20</option>
                                <option value="100">£100</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 agileinfo_grid ">
                        <h5>From*</h5>
                        <div class="agileits_w3layouts_main_gridl">
                            <input class="date" id="from_date" name="from_date" type="text" value="Please select a date"
                                   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"
                                   required="">
                        </div>
                    </div>

                    <div class="col-md-3 agileinfo_grid ">
                        <h5>To*</h5>
                        <div class="agileits_w3layouts_main_gridl">
                            <input class="date" id="to_date" name="to_date" type="text" value="Please select a date"
                                   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"
                                   required="">
                        </div>
                    </div>

                </div>



                <div>
                    <div class="col-md-3 agileinfo_grid">
                        <h5> Category*</h5>
                        <select id="category" name="category" required="">
                            <option value="all">All</option>
                            <?php
                            $getAllCategories = getListOfAllCategories();

                            foreach ($getAllCategories as $category) {
                                echo "<option value=\"".$category['Name']."\">".$category['Name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 agileits_w3layouts_grid agileinfo_grid">
                        <h5> Artist*</h5>
                        <select id="guest" name="performer" required="">
                            <?php
                            $getAllPerformers = getAllPerformers();
                            echo "<option value='all'>All</option>";
                            foreach ($getAllPerformers as $performer) {

                                echo "<option value=\"".$performer['performer_id']."\">".$performer['first_name']." ".$performer['last_name']."</option>";
                            }
                            echo "<option value='new'>CREATE NEW</option>"
                            ?>
                        </select>
                    </div>
                </div>



            </div>
            <div class="agileinfo_main_grid">
                <div class="clearfix"></div>

                <div class="w3_main_grid">

                    <div class="w3_main_grid_right">
                        <input type="submit" value="Check Availability">
                    </div>

                </div>
            </div>
        </form>

    </div>

    <!--//Header-->
    <!--/about-->
    <div class="w3-aglie-about" id="about">
        <div class="container">
            <div class="w3-agile-about-grids">
                <div class="col-md-4 about-left-grid">
                    <div style="margin-left: 80px;" class="grid-info">
                        <div class="hover-text">
                            <h5 style="text-align: center">Artists </h5>
                        </div>
                        <div class="pricing-text">
                            <?php
                                foreach (getAllArtists() as $artists) {
                                    echo "<div><a href='artist_detail.php?performer_id=".$artists['performer_id']."' style='all: unset; color:#168eea'>".$artists['first_name']." ".$artists['last_name']."</a></div>";
                                }
                            ?>

                        </div>
                        <a href="artist_view.php">All Artists</a>
                    </div>
                </div>


                <div class="col-md-4 about-left-grid">
                    <div class="grid-info">
                        <div class="hover-text">
                            <h5 style="text-align: center">Upcoming Events </h5>
                        </div>
                        <div class="pricing-text">
                            <?php
                                foreach (getAllUpcomingEvents() as $event) {
                                    echo "<div><a href='event_detail.php?event_id=".$event['event_id']."' style='all: unset; color:#168eea'>".$event['name']."</a></div>";

                                }
                            ?>
                        </div>
                        <a href="upcomming_event_view.php">All Events</a>
                    </div>
                </div>


                <div class="col-md-4 about-left-grid">
                    <div class="grid-info">
                        <div class="hover-text">
                            <h5 style="text-align: center">Category </h5>
                        </div>
                        <div class="pricing-text">
                            <?php
                            foreach (getAllCategories() as $category) {
                                echo "<div><a href='category_detail.php?category_id=".$category['Category_id']."' style='all: unset; color:#168eea'>".$category['Name']."</a></div>";

                            }
                            ?>
                        </div>
                        <a href="category_view.php">All Category</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Start of template-->

    <!--contact-->
    <div class="contact-w3layouts" id="contact">
        <div class="container">
            <div class="col-md-6 contact-agileits-w3layouts-left">
                <h3 class="title-w3-agile-sub">Contact Us</h3>
                <p class="para-agileits-w3layouts">In Music For All, we are free to help 24/7! Feel free to contact us or leave a message for us</p>
                <p class="sub">Gower Street, WC1E 6BT<span class="glyphicon glyphicon-map-marker icon"
                                                                        aria-hidden="true"></span></p>
                <p class="sub">Mon-Fri : 9am -5pm. Closed on weekends<span class="glyphicon glyphicon-time icon"
                                                                           aria-hidden="true"></span></p>
                <p class="add"><span>Tel :</span> +44 020 7679 2000<span
                            class="glyphicon glyphicon glyphicon-earphone icon" aria-hidden="true"></span></p>
                <p class="add"><span>Email :</span> <a class="mail"
                                                       href="m">info@musicforall.com</a><span
                            class="glyphicon glyphicon-envelope icon" aria-hidden="true"></span></p>

            </div>
            <div class="col-md-6 w-agile-map">
                <div class="agileits-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.377451822797!2d-0.13567988438755843!3d51.524636467264074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761b2f689479c3%3A0x73c695acbc393b22!2sKings+Cross%2C+London+WC1E+6BT!5e0!3m2!1sen!2suk!4v1513344317882"
                            allowfullscreen></iframe>
                </div>

            </div>

        </div>
    </div>
    <!--//contact-->

    <!--//contact-->


    <!-- copyright -->
    <div class="copyright-agile">
        <p>&copy; 2017 Music for All. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
    <!-- //copyright -->

    <!-- js -->
    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
    <script src="assets/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 1000,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script>

    <!-- Calendar -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css"/>
    <script src="assets/js/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#from_date,#to_date").datepicker();
        });
    </script>
    <!-- //Calendar -->
    <!-- Portfolio-Popup-Box-JavaScript -->
    <script src="assets/js/jquery.chocolat.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.w3portfolioaits-item a').Chocolat();
        });
    </script>
    <!-- //Portfolio-Popup-Box-JavaScript -->
    <!-- Tour-Locations-JavaScript -->
    <script src="assets/js/classie.js"></script>
    <script src="assets/js/helper.js"></script>
    <script src="assets/js/grid3d.js"></script>
    <script>
        new grid3D(document.getElementById('grid3d'));
    </script>
    <!-- //Tour-Locations-JavaScript -->
    <script src="assets/js/SmoothScroll.min.js"></script>
    <!-- smooth scrolling-bottom-to-top -->
    <script type="text/javascript">
        $(document).ready(function () {
            $().UItoTop({easingType: 'easeOutQuart'});
        });
    </script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <!-- //smooth scrolling-bottom-to-top -->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="assets/js/move-top.js"></script>
    <script type="text/javascript" src="assets/js/easing.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-3.1.1.min.js"></script>

    <!-- end of template-->
    <!-- start of our code -->
    <script src="index.js"> </script>




</body>
</html>
