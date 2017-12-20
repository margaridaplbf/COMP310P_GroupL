<?php

include 'core/init.php';

if (!empty($_POST)) {


    $getEventDetails = getEventDetails($_POST['event_id']);

    if (!empty($getEventDetails)) {

        echo json_encode(
            array(
                "event_id"=>$getEventDetails[0]['event_id'],
                "event_name"=>$getEventDetails[0]['event_name'],
                "event_price"=>$getEventDetails[0]['event_price'],
                "event_date"=>$getEventDetails[0]['event_date'],
                "end_purchase_date"=>$getEventDetails[0]['end_purchase_date'],
                "venue_id"=>$getEventDetails[0]['venue_id'],
                "venue_name"=>$getEventDetails[0]['venue_name'],
                "venue_capacity"=>$getEventDetails[0]['venue_capacity'],
                "performer_name"=>$getEventDetails[0]['performer_name'],
                "category_name"=>$getEventDetails[0]['category_name'],
            )
        );
    }


}

