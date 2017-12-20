<?php

include 'core/init.php';

if (!empty($_POST)) {

    $performerID = $_POST['performer'];

    if ($_POST['performer'] == "new") {
        addNewPerformer($_POST['new_performer'], $_POST['new_performer_description']);

        $split = explode(" ", $_POST['new_performer']);
        $firstName = $split[0];
        $lastName = $split[1];

        $performerID = getPerformerID($firstName, $lastName);
    }

    addEventDetails($_POST['event_name'], $_POST['venue'],$performerID,$_POST['category_id'],$_POST['price'],$_POST['event_date'],$_POST['purchase_end_date'],$_POST['user_id'], $_POST['availability']);
    echo json_encode("success");
}

