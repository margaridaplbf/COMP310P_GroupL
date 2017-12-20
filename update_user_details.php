<?php

include 'core/init.php';

if (!empty($_POST)) {
    if (!empty($_POST['current_password'])) {

        if ($_POST['new_password'] != $_POST['repeat_password']) {
            echo json_encode("password not the same");
        }

        else if (checkIfCurrentPasswordCorrect($_SESSION['user_id'], $_POST['current_password']) == "false") {
            echo json_encode("current password is wrong");
        }

        else {
            updateUserPassword($_SESSION['user_id'], $_POST['new_password']);
            echo json_encode("success");
        }
    }
    else {
        updateUserDetails($_SESSION['user_id'], $_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['email_address'], $_POST['dob'], $_POST['user_type']);
        echo json_encode("success");
    }
}

