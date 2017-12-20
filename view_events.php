<?php include 'core/init.php' ?>
<?php include 'common_headers.php' ?>

</div>
<div style="top: 10em ! important;" class="main" id="main">


    <div class="booking-form-head-agile">
        <h3 style="color: #524747"> Manage the Events You are Hosting </h3>
    </div>

    <div class="container">
        <button style="float: right" type="button" class="book_event btn btn-primary">Host an Event</button>
        <div class="w3-agile-about-grids">

            <?php
                $listOfAllUpcomingEvents = getListOfUpCominEvents($_SESSION['user_id']);
                $listOfAllPreviouslyHostedEvents = getListOfPreviouslyHostedEvents($_SESSION['user_id']);
            ?>


            <div style="margin-top: 30px;" class="about-left-grid">
                <div style="margin-left: 80px;" >
                    <div class="hover-text">
                        <h5 style="text-align: center">Upcoming Events</h5>
                    </div>
                    <div class="pricing-text">

                        <?php
                            foreach ($listOfAllUpcomingEvents as $event) {

                                $totalTicketPurchasedPerEvent = getTotalTicketsPerEvent($event['event_id']);
                                $userDetailsOfBoughtEvent = getUsersWhoBoughtTicket($event['event_id']);

                                echo "
                                    <div>
                                    <i style='float:right; cursor:pointer; color:#168eea;margin-left:20px' value='".$event['event_id']."' id='edit_event_details' class=\"edit_event_details fa fa-pencil \" aria-hidden=\"true\"></i>
                                        <p style='float: right'>Total Purchased : ".$totalTicketPurchasedPerEvent."</p>
                                        <a href='event_detail.php?event_id=".$event['event_id']."' style='all: unset; color:#168eea'>".$event['name']."</a>
                                        
                                        
                                        <ul class=\"list-group\">";


                                        foreach ($userDetailsOfBoughtEvent as $user) {
                                            echo "
                                                <li class=\"list-group-item\">".$user['user_full_name']." - ".$user['total']."</li>
                                            ";
                                        }



                                    echo "
                                        </ul>
                                        
                                    </div>
                                ";
                            }
                        ?>

                    </div>

                </div>
            </div>

            <div style="margin-top: 30px;" class="about-left-grid">
                <div style="margin-left: 80px;" >
                    <div class="hover-text">
                        <h5 style="text-align: center">Previously Hosted Events</h5>
                    </div>
                    <div class="pricing-text">
                        <?php
                            foreach ($listOfAllPreviouslyHostedEvents as $event) {
                                $totalTicketPurchasedPerEvent = getTotalTicketsPerEvent($event['event_id']);
                                $userDetailsOfBoughtEvent = getUsersWhoBoughtTicket($event['event_id']);
                                echo "
                                    <div>
               
                                        <p style='float: right'>Total Purchased : ".$totalTicketPurchasedPerEvent."</p>
                                        <a href='event_detail.php?event_id=".$event['event_id']."' style='all: unset; color:#168eea'>".$event['name']."</a>
                                        
                                        <ul class=\"list-group\">";

                                foreach ($userDetailsOfBoughtEvent as $user) {
                                    echo "
                                                <li class=\"list-group-item\">".$user['user_full_name']." - ".$user['total']."</li>
                                            ";
                                }




                                echo "
                                        </ul>
                                        
                                    </div>
                                ";
                            }
                        ?>

                    </div>

                </div>
            </div>



        </div>
    </div>


    <!-- Pop-up box to create a new event -->


    <div class="modal fade" id="add_event_modal" role="dialog">
        <div class="modal-dialog">
            <form id="add_event_form" novalidate method="post">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Event</h4>
                    </div>
                    <input type='hidden' name='user_id' id='user_id' value='<?php echo $_SESSION['user_id'] ?>' >
                    <input type='hidden' name='event_id' id='event_id' value=''>
                    <div class="modal-body">
                        <strong>Event Name</strong>
                        <input required type="text" name="event_name" id="event_name" class="form-control">
                        <strong>Venue</strong>
                        <select id="venue" name="venue" class="form-control">
                            <?php
                            $getAllVenues = getAllVenues();

                            foreach ($getAllVenues as $venue) {
                                echo "<option value=\"".$venue['venue_id']."\">".$venue['name']."</option>";
                            }
                            ?>
                        </select>
                        <strong>Performer</strong>
                        <select id="performer" name="performer" class="form-control">
                            <?php
                            $getAllPerformers = getAllPerformers();

                            foreach ($getAllPerformers as $performer) {
                                echo "<option value=\"".$performer['performer_id']."\">".$performer['first_name']." ".$performer['last_name']."</option>";
                            }
                                echo "<option value='new'>CREATE NEW</option>"
                            ?>
                        </select>
                        <div id="new_performer" style="display: none;">
                            <strong>Performer</strong>
                            <input required type="text" name="new_performer" id="new_performer" class="form-control">
                            <strong>Description</strong>
                            <textarea style="resize: none" class="form-control" name="new_performer_description" id="new_performer_description" rows="5" id="comment"></textarea>
                        </div>
                        <strong>Category</strong>
                        <select id="category_id" name="category_id" class="form-control">
                            <?php
                            $getAllCategories = getListOfAllCategories();

                            foreach ($getAllCategories as $category) {
                                echo "<option value=\"".$category['Category_id']."\">".$category['Name']."</option>";
                            }
                            ?>
                        </select>
                        <strong>Price</strong>
                        <input required type="text" name="price" id="price" class="form-control">
                        <strong>Event Availability</strong>
                        <input required type="text" name="availability" id="availability" class="form-control">
                        <strong>Event Date</strong>
                        <input required type="date" name="event_date" id="event_date" class="form-control">
                        <strong>Purchase End Date</strong>
                        <input required type="date" name="purchase_end_date" id="purchase_end_date" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit_event_details_form_submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>


        </div>
    </div>



<!-- Pop-up box to edit event details -->

    <div class="modal fade" id="edit_event_details_modal" role="dialog">
        <div class="modal-dialog">
            <form id="edit_event_details_form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Event Details</h4>
                    </div>
                    <input type='hidden' name='user_id' id='user_id' value='<?php echo $_SESSION['user_id'] ?>' >
                    <input type='hidden' name='event_id' id='event_id_edit' value=''>
                    <div class="modal-body">
                        <strong>Event Name</strong>
                        <input type="text" name="event_name" id="event_name_edit" class="form-control">
                        <strong>Venue</strong>
                        <select id="venue_edit" name="venue" class="form-control">
                            <?php
                                $getAllVenues = getAllVenues();

                                foreach ($getAllVenues as $venue) {
                                    echo "<option value=\"".$venue['venue_id']."\">".$venue['name']."</option>";
                                }
                            ?>
                        </select>
                        <strong>Event Date</strong>
                        <input type="text" name="event_date" id="event_date_edit" class="form-control">
                        <strong>Purchase End Date</strong>
                        <input type="text" name="purchase_end_date" id="purchase_end_date_edit" class="form-control">
                        <strong>Event Availability</strong>
                        <input type="text" name="availability" id="availability_edit" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit_event_details_form_submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>


        </div>
    </div>



    
    <!-- copyright -->
    <div class="copyright-agile">
        <p>&copy; 2017 Music for All. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
    <!-- //copyright -->

    <!-- template's JS for top right button -->

    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-3.1.1.min.js"></script>

    <script src="view_events.js"></script>


</body>
</html>