<?php
session_start();
error_reporting(0);

require 'functions.php';
require 'database/connection.php';
include 'loop.php';

if(user_logged_in() === true){
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'user_id', 'title', 'username', 'first_name', 'last_name', 'email_address', 'dob', 'user_type');
}
?>
