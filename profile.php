<?php include 'core/init.php' ?>
<?php include 'common_headers.php' ?>

</div>
<div style="top: 10em ! important;" class="main" id="main">
    <div style="margin-bottom: 10em;" class="w3layouts_main_grid">
        <div class="booking-form-head-agile">
            <h3>Profile</h3>
        </div>
        <form id="user_profile_form" method="post">
            <div style="margin-top: 20px">
                <div class="col-md-3 agileinfo_grid ">
                    <div class="form-group">
                        <label class="profile_label">Username:</label>
                        <?php echo "<input style='cursor: not-allowed;' readonly type=\"text\" class=\"form-control\" name=\"username\" value='".$user_data[0]['username']."' id=\"username\">"; ?>
                    </div>
                </div>
                <div class="col-md-3 agileinfo_grid ">
                    <div class="form-group">
                        <label class="profile_label">First Name:</label>
                        <?php echo "<input type=\"text\" class=\"form-control\" name=\"first_name\" value='".$user_data[0]['first_name']."' id=\"first_name\">"; ?>
                    </div>
                </div>
                <div class="col-md-3 agileinfo_grid">
                    <div class="form-group">
                        <label class="profile_label">Last Name:</label>
                        <?php echo "<input type=\"text\" class=\"form-control\" name=\"last_name\" value='".$user_data[0]['last_name']."' id=\"last_name\">"; ?>
                    </div>
                </div>
                <div class="col-md-3 agileits_w3layouts_grid agileinfo_grid">
                    <div class="form-group">
                        <label class="profile_label">Email address:</label>
                        <?php echo "<input style='cursor: not-allowed;' readonly type=\"email\" class=\"form-control\" name=\"email_address\" value='".$user_data[0]['email_address']."' id=\"email_address\">"; ?>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px">
                <div class="col-md-6 agileinfo_grid ">
                    <div class="form-group">
                        <label class="profile_label">Date of birth:</label>
                        <?php echo "<input required class=\"form-control\" value='".$user_data[0]['dob']."' type=\"date\" id=\"dob\" name=\"dob\">"; ?>
                    </div>
                </div>
                <div class="col-md-6 agileinfo_grid ">
                    <div class="form-group">
                        <label class="profile_label">Account Type:</label>

                        <select name="user_type" class="form-control">
                            
                            <?php
                            
                            
                            
                            if ($_POST['user_type'] == "Host" or "Participant") {
                                $availableLists = array("both");
                            }
                            

                            foreach ($availableLists as $item) {
                                $properCase = ucfirst($item);
                                if ($item == $user_data[0]['user_type']) {
                                    echo "<option selected value=\"{$item}\">$properCase</option>";
                                }
                                else {
                                    echo "<option value=\"{$item}\">$properCase</option>";
                                }
                            }
                            
                            
                            

                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px">
                <div>
                    <p style="margin-left: 15px;color: #ffffff; font-size: 12px;margin-bottom: 10px">Only change password if you require it by filling below fields</p>
                </div>
                <div class="col-md-4 agileinfo_grid ">
                    <div class="form-group">
                        <label class="profile_label">Current Password:</label>
                        <input name="current_password" type="password" class="form-control" id="pwd">
                    </div>
                </div>
                <div class="col-md-4 agileinfo_grid ">
                    <div class="form-group">
                        <label class="profile_label">New Password:</label>
                        <input name="new_password" type="password" class="form-control" id="pwd">
                    </div>
                </div>
                <div class="col-md-4 agileinfo_grid ">
                    <div class="form-group">
                        <label class="profile_label">Retype Password:</label>
                        <input name="repeat_password" type="password" class="form-control" id="pwd">
                    </div>
                </div>
            </div>

            <div class="agileinfo_main_grid">
                <div class="clearfix"></div>

                <div class="w3_main_grid">

                    <div class="w3_main_grid_right">
                        <input type="submit" value="Update Details">
                    </div>

                </div>
            </div>
        </form>

    </div>
    <!-- subscribe -->
    <div class="agileits_w3layouts_subscribe_info">
        <div class="container">
            <div class=" subscribe-grids">
                <div class="col-md-4 subscribe-head">
                    <h3>Subscribe now</h3>
                    <p>be the first who knows</p>
                </div>
                <div class="col-md-8 subscribe-form">
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="Enter your Email..." required="">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //subscribe -->
    <div class="w3-footer">
        <div class="W3-footer-grids">
            <div class="col-md-6 footer-left-icons">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>

            </div>
            <div class="col-md-6 footer-right">
                <ul>
                    <li><a href="#news" class="scroll" data-hover="News">News</a></li>
                    <li><a href="#price" class="scroll" data-hover="Price List">Price List</a></li>
                    <li><a href="#contact" class="scroll" data-hover="Contact">Contact</a></li>
                </ul>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- copyright -->
    <div class="copyright-agile">
        <p>&copy; 2017 Snow tour. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
    <!-- //copyright -->

    <!-- template's JS for top right button -->

    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-3.1.1.min.js"></script>

    <script src="profile.js"></script>


    </body>
</html>