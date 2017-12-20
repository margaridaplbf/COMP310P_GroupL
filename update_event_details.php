<?php

include 'core/init.php';

if (!empty($_POST)) {

    updateEventDetails($_POST['user_id'],$_POST['event_id'],$_POST['event_name'],$_POST['venue'],$_POST['event_date'],$_POST['purchase_end_date'], $_POST['availability']);
    echo json_encode("success");

}

