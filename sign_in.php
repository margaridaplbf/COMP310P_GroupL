<?php

include 'core/init.php';

if (!empty($_POST)) {

    //check if username exist
    if (!checkIfUserNameTaken($_POST['username1'])) {
        echo json_encode("username doesn't exist");
    }

    else{
        $login = login($_POST['username1'], $_POST['password1']);
        // $login = password_verify($_POST['password1'],hashh($_POST['password1']));
        // echo json_encode((string)$login);

        if (!$login) {
            echo json_encode("email address and password combination does not match");
        }
        else {
            $_SESSION['user_id'] = $login;
            echo json_encode("success");
        }
    }

}





