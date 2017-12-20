<?php include 'core/init.php' ?>
<?php include 'common_headers.php' ?>
<div style="top: 10em ! important;" class="main" id="main">


    <div class="booking-form-head-agile">
        <h3 style="color: #524747">Artists</h3>
    </div>

    <div class="container">
        <div class="w3-agile-about-grids">

            <?php
                $listOfAllArtists = getListOfAllArtists();
                $alphaOrder = array();

                foreach ($listOfAllArtists as $key => $artist) {

                    $artistFullName = $artist['first_name'] . " " . $artist['last_name'];
                    $firstCharacter = substr($artist['first_name'], 0, 1);

                    if (!in_array($firstCharacter, $alphaOrder[$key])) {
                        $alphaOrder[substr($artist['first_name'], 0, 1)][] = array(
                            "id"        => $artist['performer_id'],
                            "string"    => substr($artist['first_name'], 0, 1),
                            "content"   => $artistFullName,
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
                                            <div><a href='artist_detail.php?performer_id=".$items['id']."' style='all: unset; color:#168eea'>".$items['content']."</a></div>
                                        ";
                                    }


                    echo "          
                                </div>
                                
                            </div>
                        </div>
                    ";
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