<?php

//this will use the functions in the function php to check if the user already exists in the DB
//if the user already exists it will return json_encode that will then be translated to error messages to the user
//if the user doesn't exist it will use the createUserRecord function to make a new record in the DB
//after, it will asses if the registration was successful or not and return json_encode that will then be translated messages to the user

include 'core/init.php';

if (!empty($_POST)) {

    //validation - checks if username is not taken, if username and password are long enough and contain only allowed characters, if the email is valid and not taken, etc.
    //first some variables are declared for the age validation.
    $timestamp = strtotime('-16 years');
    $newtime = date('Y-m-d', $timestamp);
    if (checkIfUserNameTaken($_POST['username'])) {
        echo json_encode("username taken"); //converts a PHP value into a JSON value
    }

    //check if email address is taken
    else if (checkIfEmailTaken($_POST['email_address'])) {
        echo json_encode("email taken");
    }

    //check if passwords are the same
    else if ($_POST['password'] != $_POST['retype_password']) {
        echo json_encode("passwords not same");
    }
    else if (strlen($_POST['password'])<8){
        echo json_encode('too short');
    }
    else if (strlen($_POST['username'])<3 || strlen($_POST['uname'])>20){
        echo json_encode('length uname');
    }
    else if ( preg_match("/[^-a-zA-Z0-9_]/i", $_POST['username']) ) {
        echo json_encode("icu");
    }
    else if(!preg_match("@[A-Z]@", $_POST['password']) || !preg_match('@[a-z]@', $_POST['password']) || !preg_match('@[0-9]@', $_POST['password'])) {
        echo json_encode("icp");
    }
    else if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $_POST['email_address'])){
        echo json_encode('invalid email');
    }
    else if ($_POST['dob']>$newtime){
        echo json_encode("too yung");
    }
    else {
        //creating the user record into the database
        $userRegistration = createUserRecord($_POST);

        //checking if successfully created the record
        if ($userRegistration == "SUCCESS") {
            echo json_encode("successfully created");
        }

        //checking if there was any issue while creating the record to the database
        else if ($userRegistration == "FAILED") {
            echo json_encode("failed to create account");
        }
    }
}

?>

