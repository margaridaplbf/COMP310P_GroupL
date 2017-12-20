<?php include 'core/init.php' ?>
<?php include 'common_headers.php' ?>

</div>
<div style="top: 10em ! important;" class="main" id="main">

    <div class="booking-form-head-agile">
        <h3 style="color: #524747"> <?php $eventName = getEventFromEventID($_GET['event_id'])['name']; echo $eventName; ?> </h3>
    </div>

    <div class="container">
        <div class="w3-agile-about-grids">

            <?php
            $listOfAllEventByArtist = getEventDetails($_GET['event_id']);
            $numberOfPeopleAttendingThisEvent = numberOfPeopleAttendingAnEvent($_GET['event_id']);
            $availableSeatsForThisEvent = $listOfAllEventByArtist[0]['venue_capacity'] - $numberOfPeopleAttendingThisEvent;

            $reviewForTheEvent = getAllReviewsForAnEvent($_GET['event_id']);

            if ($availableSeatsForThisEvent <= 0) {
                $availableSeatsForThisEvent = "Sold Out";
            }

            $eventStatus = "Closed";

            if (date('Y-m-d') <= $listOfAllEventByArtist[0]['event_date']){
                $eventStatus = "Open";

                if ($availableSeatsForThisEvent > 0) {
                    $eventStatus = "Open (seats available)";
                }
            }

            if ($_SESSION['user_id']) {
                if (in_array($user_data[0]['user_type'], array("both", "participant"))
                    && !checkIfEventIsBought($_SESSION['user_id'], $_GET['event_id'])
                ) {
                    echo "
                            <input type='hidden' id='loggedin_user_id' value='".$_SESSION['user_id']."'>
                            <input type='hidden' id='current_event_id' value='".$_GET['event_id']."'>
                            <button style='float: right' type=\"button\" class=\"btn buy_event_ticket btn-success\">Buy Ticket</button>
                        ";
                }

                else if (
                    in_array($user_data[0]['user_type'], array("both", "participant"))
                    && checkIfEventIsBought($_SESSION['user_id'], $_GET['event_id'])
                ) {
                    echo "
                            <button disabled style='float: right' type=\"button\" class=\"btn btn-primary\">Purchased Ticket</button>
                        ";
                }
            }


            echo "
                    <div>
                        <div class=\"container\">
                            <div class=\"col-md-12 w3-services-grids\">
                                
                                <div style='margin-bottom: 100px;' class=\"w3-services-grids-left\">
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9;margin-right: 20px;' class=\"fa fa-cogs\" aria-hidden=\"true\"></i></span>Even Status</h3>
                                        <p>".$eventStatus."</p>
                                    </div>
                                
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9;margin-right: 20px;' class=\"fa fa-hourglass-start\" aria-hidden=\"true\"></i></span>Available Seats</h3>
                                        <p>".$availableSeatsForThisEvent."</p>
                                    </div>
                                    
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9;margin-right: 20px;' class=\"fa fa-tasks\" aria-hidden=\"true\"></i></span>Attending</h3>
                                        <p>".$numberOfPeopleAttendingThisEvent."</p>
                                    </div>
                                    
                                    <div class=\"clearfix\"></div>
                                </div>
                            
                            
                                <div class=\"w3-services-grids-left\">
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9;margin-right: 20px;' class=\"fa fa-cog\" aria-hidden=\"true\"></i></span>Category</h3>
                                        <p>".$listOfAllEventByArtist[0]['category_name']."</p>
                                    </div>
                                    
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9;margin-right: 20px;' class=\"fa fa-list\" aria-hidden=\"true\"></i></span>Artist</h3>
                                        <p>".$listOfAllEventByArtist[0]['performer_name']."</p>
                                    </div>
                                    
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9;margin-right: 20px;' class=\"fa fa-sort-amount-desc\" aria-hidden=\"true\"></i></span>Price</h3>
                                        <p>£".number_format($listOfAllEventByArtist[0]['event_price'], 2)."</p>
                                    </div>
                                    <div class=\"clearfix\"></div>
                                </div>
                                
                                
                                <div class=\"w3-agile-grid-left-bottom\">
                                
                                
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9;margin-right: 20px;' class=\"fa fa-calendar\" aria-hidden=\"true\"></i></span>Event Date</h3>
                                        <p>".$listOfAllEventByArtist[0]['event_date']."</p>
                                    </div>
                                    
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9;margin-right: 20px;' class=\"fa fa-calendar\" aria-hidden=\"true\"></i></span>Purchase End Date</h3>
                                        <p>".$listOfAllEventByArtist[0]['end_purchase_date']."</p>
                                    </div>
                                    
                                    <div class=\"col-md-4 w3-services-grid-icon1 w3-border-bootom1\">
                                        <h3><span><i style='color: #1a5fa9' class=\"fa fa-home\" aria-hidden=\"true\"></i></span>Venue</h3>
                                        <p>".$listOfAllEventByArtist[0]['venue_name']."</p>
                                        <p>".$listOfAllEventByArtist[0]['venue_address']."</p>
                                        <p>".$listOfAllEventByArtist[0]['venue_city']."</p>
                                        <p>".$listOfAllEventByArtist[0]['venue_postcode']."</p>
                                    </div>
                                    
                                    <div class=\"clearfix\"></div>
                                </div>
                            </div>";


            $eventDate = new \DateTime(getEventDetails($_GET['event_id'])[0]['event_date']);
            $eventDate = $eventDate->format('Y-m-d');

            if (!checkIfReviewLeft($_SESSION['user_id'], $_GET['event_id'])
                && $_SESSION['user_id']
                && date('Y-m-d') >= $eventDate
            ) {
                echo "
                                <div style='margin-top:20px;'>
                                    <input type='hidden' id='loggin_user_id' value='".$_SESSION['user_id']."'>
                                    <input type='hidden' id='current_event_id' value='".$_GET['event_id']."'>
                                    <button style='float: left;' type=\"button\" class=\"leave_review btn btn-success\">Leave a Review</button>
                                </div>
                            ";
            }

            else if (
                !checkIfReviewLeft($_SESSION['user_id'], $_GET['event_id'])
                && $_SESSION['user_id']
                && date('Y-m-d') < $eventDate
            ) {
                echo "
                                <div style='margin-top:20px;'>
                                    <input type='hidden' id='loggin_user_id' value='".$_SESSION['user_id']."'>
                                    <input type='hidden' id='current_event_id' value='".$_GET['event_id']."'>
                                    <p style='color:crimson'>Please wait till the event date in order to leave a Review </p>
                                </div>
                            ";
            }

            else if (checkIfReviewLeft($_SESSION['user_id'], $_GET['event_id'])) {
                echo "
                                <div style='margin-top:20px;'>
                                    <button disabled style='float: left;' type=\"button\" class=\"btn btn-primary\">Reviewed</button>
                                </div>
                            ";
            }


            echo "            
                            
                            
                        </div>
                        
                        
                        
                        
                        <div style=\"margin-left: 80px;width:100%;\">
                            <div class=\"hover-text\">
                                <h5 style=\"text-align: center;\">Reviews </h5>
                            </div>
                            <div class=\"pricing-text\">
                                <table class=\"table table-striped\">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Feedback</th>
                                        <th>Rating (out of 5)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                ";

            foreach ($reviewForTheEvent as $key => $value) {

                echo "
                                          <tr>
                                            <td>".$value['user_full_name']."</td>
                                            <td>".$value['feedback']."</td>
                                            <td>".$value['Rating']."</td>
                                        </tr>
                                          
                                    ";
            }

            echo "
                                </tbody>
                                </table>
                                
                                
                            </div>
                            
                        </div>
                        
                        
                    </div>
                ";

            ?>

        </div>
    </div>

    <div class="modal fade" id="buy_ticket_modal_form" role="dialog">
        <div class="modal-dialog">

            <form id="buy_ticket_form_form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Buy Ticket</h4>
                    </div>
                    <input type='hidden' name='user_id' id='user_id' value='<?php echo $_SESSION['user_id'] ?>' >
                    <input type='hidden' name='event_id' id='event_id' value='<?php echo $_GET['event_id'] ?>'>
                    <div class="modal-body">
                        <strong>Number of tickets</strong>
                        <select name="guest" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="forgotten_password_form_submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <div class="modal fade" id="review_modal_form" role="dialog">
        <div class="modal-dialog">

            <form id="review_form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Leave a Review</h4>
                    </div>
                    <input type='hidden' name='user_id' id='user_id' value='<?php echo $_SESSION['user_id'] ?>' >
                    <input type='hidden' name='event_id' id='event_id' value='<?php echo $_GET['event_id'] ?>'>
                    <div class="modal-body">
                        <strong>Feedback</strong>
                        <textarea style="resize: none;margin-top: 20px;" required name="feedback" class="form-control" rows="5" id="feedback"></textarea>
                        <strong>Rating</strong>
                        <select name="rating" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="forgotten_password_form_submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>


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

    <!-- template js -->
    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/js/move-top.js"></script>
    <script type="text/javascript" src="assets/js/easing.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-3.1.1.min.js"></script>

    <!-- our js -->
    <script src="event_detail.js"></script>


</body>
</html>