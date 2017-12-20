<?php include 'core/init.php' ?>
<?php include 'common_headers.php' ?>

    <!--//Slider-->
</div>
<div style="top: 10em ! important;" class="main" id="main">


    <div class="booking-form-head-agile">
        <h3 style="color: #524747"> <?php $artistName = getArtistFromPerformerID($_GET['performer_id'])['first_name'] . " " . getArtistFromPerformerID($_GET['performer_id'])['last_name']; echo $artistName; ?> </h3>
        <p style="color: #524747;width: 50%;margin-left: 25%;margin-top: 20px;"> <?php $artistDescription = getArtistFromPerformerID($_GET['performer_id'])['description']; echo $artistDescription; ?> </p>
    </div>

    <div class="container">
        <div class="w3-agile-about-grids">

            <?php
                $listOfAllEventByArtist = getListOfEventsByArtist($_GET['performer_id']);

                if (count($listOfAllEventByArtist) <= 0) {
                    echo "</h>No events are found under <b>{$artistName}</b> </h5>";
                }

                else {
                    $alphaOrder = array();

                    foreach ($listOfAllEventByArtist as $key => $event) {

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



   
    <!-- copyright -->
    <div class="copyright-agile">
        <p>&copy; All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
    <!-- //copyright -->

    <!-- template's JS for top right button -->
    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-3.1.1.min.js"></script>

        <script>
            document.getElementById("button").style.display="block";

            </script>


</body>
</html>