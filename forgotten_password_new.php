<?php

include 'core/init.php';

if (!empty($_POST)) {

    if ($_POST['passs']!=$_POST['passre']){
        echo json_encode("no match");
    }else if(strlen($_POST['passs'])<8){
        echo json_encode('too short');

    }else{
            echo json_encode('success');
            updateUserPasswordByName($_POST['emailpass'], $_POST['passs']);

    }

}


 ?>
