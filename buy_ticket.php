<?php

include 'core/init.php';

if (!empty($_POST)) {

    //check if seats available
    $numberofPeopleAttending = numberOfPeopleAttendingAnEvent($_POST['event_id']);
    $eventCampacity = getEventDetails($_POST['event_id']);
    $eventCampacity = $eventCampacity[0]['venue_capacity'];
    $availableSeats = $eventCampacity - $numberofPeopleAttending;

    if ($availableSeats <= 0) {
        echo json_encode("capacity reached");
    }

    else if ($availableSeats < $_POST['guest']) {
        echo json_encode("Available seats " . $availableSeats);
    }

    else {
        $numberOfGuests = $_POST['guest'];

        for ($x = 0; $x < $numberOfGuests; $x++) {
            buyEventTicket($_POST['user_id'], $_POST['event_id']);
        }


        echo json_encode("success");
    }


}

