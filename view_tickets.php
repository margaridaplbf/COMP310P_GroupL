<?php include 'core/init.php' ?>
<?php include 'common_headers.php' ?>

</div>
<div style="top: 10em ! important;" class="main" id="main">


    <div class="booking-form-head-agile">
        <h3 style="color: #524747">Tickets</h3>
    </div>

    <div class="container">
        <div class="w3-agile-about-grids">

            <?php
                $listOfAllPurchasedTickets = purchasedTickets($_SESSION['user_id']);

                $alphaOrder = array();

                if (count($listOfAllPurchasedTickets) <= 0) {
                    echo "</h>No history of ticket purchase </h5>";
                }

                else {
                    foreach ($listOfAllPurchasedTickets as $key => $event) {

                        $eventName = $event['event_name'];
                        $firstCharacter = substr($event['event_name'], 0, 1);

                        if (!in_array($firstCharacter, $alphaOrder[$key])) {
                            $alphaOrder[substr($event['event_name'], 0, 1)][] = array(
                                "id"            => $event['event_id'],
                                "string"        => substr($event['event_name'], 0, 1),
                                "content"       => $eventName,
                                "purchase_date" => $event['Purchase_Date'],
                                "purchased"     => $event['total'],
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
                                                <a href='event_detail.php?event_id=".$items['id']."' style='all: unset; color:#168eea'>".$items['content']."</a>
                                                <span style='margin-left:20%;'>Total Purchased : ".$items['purchased']."</span>
                                                <span style='color:#277519;font-weight: 900;float: right'>".$items['purchase_date']."</span>
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



   
    <!-- copyright -->
    <div class="copyright-agile">
        <p>&copy; 2017 Music for All. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
    <!-- //copyright -->
    <!-- template's JS for top right button -->

    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-3.1.1.min.js"></script>
</body>
</html>