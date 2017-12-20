<?php include 'core/init.php' ?>
<?php include 'common_headers.php' ?>

<div style="top: 10em ! important;" class="main" id="main">

    <div class="booking-form-head-agile">
        <h3 style="color: #524747"> Reviews </h3>
    </div>

    <div class="container">
        <div class="w3-agile-about-grids">

            <?php

            $reviewForTheEvent = getAllUserReviews($_SESSION['user_id']);


            if (count($reviewForTheEvent) <= 0) {
                echo "No reviews found under this account";
            }

            else {
                echo "<div style=\"margin-left: 80px;width:100%;\">
                            
                            <div class=\"pricing-text\">
                                <table class=\"table table-striped\">
                                    <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Feedback</th>
                                        <th>Rating (out of 5)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                ";

                foreach ($reviewForTheEvent as $key => $value) {

                    echo "
                                          <tr>
                                            <td>".$value['event_name']."</td>
                                            <td>".$value['feedback']."</td>
                                            <td>".$value['Rating']."</td>
                                        </tr>
                                          
                                    ";
                }

                echo "
                                </tbody>
                                </table>
                                
                                
                            </div>
                            
                        </div>";
            }



            ?>
            
            

        </div>
    </div>

    <!-- subscribe -->
    <div style="margin-top: 10%" class="agileits_w3layouts_subscribe_info">
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

</body>
</html>