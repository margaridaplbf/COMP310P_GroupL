<?php

require 'core/init.php';

if (!empty($_POST)) {

    //check if provided secret answer is correct
    if (checkSecretAnswer($_POST['email_address'],$_POST['secret_answer'])) {
        echo json_encode("success");
    }
    else {
        echo json_encode("failed");
    }
}


 ?>
