<?php

include 'core/init.php';

if (!empty($_POST)) {


    if (leaveReviewOnEvent($_POST['user_id'], $_POST['event_id'], $_POST['feedback'], $_POST['rating'])) {
        echo json_encode("success");
    }

}

