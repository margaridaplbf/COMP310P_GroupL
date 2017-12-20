<?php include 'core/init.php' ?>
<?php include 'common_headers.php' ?>

<div style="top: 10em ! important;" class="main" id="main">


    <div class="booking-form-head-agile">
        <h3 style="color: #524747"> <?php $categoryName = getCategoryFromCategoryID($_GET['category_id'])['Name']; echo $categoryName; ?> </h3>
    </div>

    <div class="container">
        <div class="w3-agile-about-grids">

            <?php
                $listOfAllEventByCategory = getListOfEventsByCategory($_GET['category_id']);

                if (count($listOfAllEventByCategory) <= 0) {
                    echo "</h>No events are found under <b>{$categoryName}</b> </h5>";
                }

                else {
                    $alphaOrder = array();

                    foreach ($listOfAllEventByCategory as $key => $event) {

                        $firstCharacter = substr($event['name'], 0, 1);

                        if (!in_array($firstCharacter, $alphaOrder[$key])) {
                            $alphaOrder[substr($event['name'], 0, 1)][] = array(
                                "id"        => $event['event_id'],
                                "string"    => substr($event['name'], 0, 1),
                                "content"   => $event['name'],
                                "end_date"  => $event['end_purchase_date']
                            );
                        }
                    }

                    foreach ($alphaOrder as $key => $alpha) {

                        echo "
                        <div style=\"margin-top: 30px;\" class=\"about-left-grid\">
                            <div style=\"margin-left: 80px;\" >
                                <div class=\"hover-text\">
                                    <h5 style=\"text-align: center\">".$key."</h5>
                                </div>
                                <div class=\"pricing-text\">";


                        foreach ($alpha as $items) {
                            echo "
                                            <div>
                                                <a href='event_detail.php?event_id=".$items['id']."' style='all: unset; color:#168eea'>".$items['content']."</a>";

                            if (date('Y-m-d') <= $items['end_date']) {
                                echo "
                                                <span style='color:#277519;font-weight: 900;float: right'>Open</span>
                                            ";
                            }

                            else {
                                echo "
                                                <span style='color:crimson;font-weight: 900;float: right'>Closed</span>
                                            ";
                            }

                            echo "        
                                            </div>
                                        ";
                        }


                        echo "          
                                </div>
                                
                            </div>
                        </div>
                    ";
                    }
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