<?php

include 'core/init.php';

if (!empty($_POST)) {

    //check if email address exists
    if (!checkIfEmailTaken($_POST['email_address'])) {
        echo json_encode("email address doesn't exist");
    }

    else{
        if (forgetUserDetails($_POST['email_address'])) {

            echo json_encode(getSecretQuestion($_POST['email_address']));

        }
        else {
            echo json_encode("failed");
        }
    }

}
?>
