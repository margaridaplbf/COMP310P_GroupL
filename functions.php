<?php



function get() {
    $db = new mysqli('localhost', 'root', 'root', 'music');
    return $db;
}

function checkIfCurrentPasswordCorrect ($user_id, $password) {
    $sql = <<<SQL
SELECT COUNT(`user_id`) as count
FROM `user`
WHERE `user_id` = '$user_id'
AND `password` = '$password'
SQL;

    $result = mysqli_fetch_assoc(get()->query($sql));

    return ($result['count'] == 1 ? "true" : "false");

//     $sql = <<<SQL
// SELECT 'password'
// FROM 'user'
// WHERE 'user_id'='$user_id'
// SQL;

//     $result = mysqli_fetch_assoc(get()->query($sql));
//     return password_verify($password,$result['password']);

}

function getAllCategories () {
    $sql = <<<SQL
SELECT *
FROM `category`
ORDER BY Name ASC
LIMIT 5
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getAllUpcomingEvents () {
    $sql = <<<SQL
SELECT *
FROM `event`
ORDER BY name ASC
LIMIT 5
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getListOfAllUpcomingEvents () {
    $sql = <<<SQL
SELECT *
FROM `event`
ORDER BY name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getImmediateEvents () {

    $date = date("Y-m-d", strtotime("+1 week"));

    $sql = <<<SQL
SELECT *
FROM `event`
WHERE DATE(`event_date`) <= '$date'
ORDER BY name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getListOfAllCategories () {
    $sql = <<<SQL
SELECT *
FROM `category`
ORDER BY Name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getListOfEventsByCategory ($category_id) {
    $sql = <<<SQL
SELECT *
FROM `event`
WHERE `Category_id` = '$category_id'
ORDER BY name ASC
SQL;

    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getListOfEventsByArtist ($performer_id) {
    $sql = <<<SQL
SELECT *
FROM `event`
WHERE `Performer_id` = '$performer_id'
ORDER BY name ASC
SQL;

    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function checkIfEventIsBought ($user_id, $event_id) {
    $sql = <<<SQL
SELECT COUNT(`Ticket_id`) as count
FROM `ticket`
WHERE `User_id` = '$user_id'
AND `Event_id` = '$event_id'
SQL;
    $result = mysqli_fetch_assoc(get()->query($sql));
    return ($result['count'] >= 1 ? true : false);
}

function buyEventTicket ($user_id, $event_id) {
    $purchaseDate = date('Y-m-d H:m:s');
    $sql = <<<SQL
INSERT INTO `ticket` (Purchase_Date, User_id, Event_id) VALUES ('$purchaseDate', '$user_id', '$event_id')
SQL;

    return get()->query($sql);
}

function getUsersWhoBoughtTicket ($event_id) {
    $sql = <<<SQL
SELECT CONCAT(user.first_name, ' ', user.last_name) as user_full_name, user.user_id as userid, user.email_address as email_address, COUNT(*) as total,
FROM `ticket`
JOIN `user` ON `user`.`user_id` = `ticket`.`User_id`
WHERE `ticket`.`Event_id` = '$event_id'
GROUP BY `user`.`user_id`
ORDER BY user_full_name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function numberOfPeopleAttendingAnEvent ($event_id) {
    $sql = <<<SQL
SELECT COUNT(`user_id`) as count
FROM `ticket`
WHERE `Event_id` = '$event_id'
SQL;

    $result = mysqli_fetch_assoc(get()->query($sql));

    return $result['count'];
}

function getAllUserReviews ($user_id) {
    $sql = <<<SQL
SELECT reviews.feedback, reviews.Rating, CONCAT(user.first_name, ' ', user.last_name) as user_full_name, event.name as event_name
FROM `reviews`
JOIN `event` ON `event`.`event_id` = `reviews`.`Event_id`
JOIN `user` ON `user`.`user_id` = `reviews`.`User_id`
WHERE `user`.`user_id` = '$user_id'
GROUP BY `event`.`event_id`
ORDER BY event_name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getAllReviewsForAnEvent ($event_id) {
    $sql = <<<SQL
SELECT reviews.feedback, reviews.Rating, CONCAT(user.first_name, ' ', user.last_name) as user_full_name
FROM `reviews`
JOIN `user` ON `user`.`user_id` = `reviews`.`User_id`
WHERE `Event_id` = '$event_id'
GROUP BY `user`.`user_id`
ORDER BY first_name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function leaveReviewOnEvent ($user_id, $event_id, $feedback, $rating) {
    $sql = <<<SQL
INSERT INTO `reviews` (Event_id, User_id, Feedback, Rating) VALUES ('$event_id', '$user_id', '$feedback', '$rating')
SQL;

    return get()->query($sql);
}

function getTotalTicketsPerEvent ($event_id) {
    $sql = <<<SQL
SELECT COUNT(*) as total
FROM `ticket`
WHERE `ticket`.`Event_id` = '$event_id'
SQL;

    $result = mysqli_fetch_assoc(get()->query($sql));

    return $result['total'];
}

function getListOfUpCominEvents ($user_id) {
    $today = date('Y-m-d');
    $sql = <<<SQL
SELECT *
FROM `event`
WHERE `created_by` = '$user_id'
AND DATE(`event_date`) >= '$today'
ORDER BY name ASC
SQL;

    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getListOfPreviouslyHostedEvents ($user_id) {
    $today = date('Y-m-d');
    $sql = <<<SQL
SELECT *
FROM `event`
WHERE `created_by` = '$user_id'
AND DATE(`event_date`) < '$today'
ORDER BY name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function checkIfReviewLeft ($user_id, $event_id) {
    $sql = <<<SQL
SELECT COUNT(`Review_id`) as count
FROM `reviews`
WHERE `User_id` = '$user_id'
AND `Event_id` = '$event_id'
SQL;

    $result = mysqli_fetch_assoc(get()->query($sql));
    return ($result['count'] == 1 ? true : false);
}

function purchasedTickets ($user_id) {
    $sql = <<<SQL
SELECT event.event_id, ticket.Purchase_Date, event.name as event_name, COUNT(*) as total
FROM `ticket`
JOIN `event` ON `event`.`event_id` = `ticket`.`Event_id`
WHERE `User_id` = '$user_id'
GROUP BY User_id, Event_id
ORDER BY name ASC
SQL;

    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function eventSearch ($from_date, $to_date, $category, $performer, $priceFrom, $priceTo) {


    $from_date = explode("/", $from_date);
    $from_date = $from_date[2]."-".$from_date[1]."-".$from_date[0];

    $to_date = explode("/", $to_date);
    $to_date = $to_date[2]."-".$to_date[1]."-".$to_date[0];

    $counter=1;

    $sqlQuery = "SELECT event.event_id, event.name as event_name, event.price as event_price, event.event_date, event.end_purchase_date
FROM `event`
JOIN `performers` ON `performers`.`performer_id` = `event`.`Performer_id`
JOIN `category` ON `category`.`Category_id` = `event`.`Category_id`
JOIN `venue` ON `venue`.`venue_id` = `event`.`Venue_id`";

    if ($from_date!="--Please select a date"){
        $counter++;
        $sqlQuery.= "WHERE DATE(`event`.`event_date`) >= '$from_date' ";
    }

    if ($priceFrom != "all") {
        $counter++;
        $sqlQuery .= ($counter==1?"WHERE":"AND")." `event`.`price` >= '$priceFrom'";
    }

    if ($priceTo != "all") {
        $counter++;
        $sqlQuery .= ($counter==1?"WHERE":"AND")." `event`.`price` <= '$priceTo'";
    }

    if ($category != "all") {
        $counter++;
        $sqlQuery .= ($counter==1?"WHERE":"AND")." `category`.`Name` = '$category'";
    }

    if ($performer != "all") {
        $counter++;
        $sqlQuery .= ($counter==1?"WHERE":"AND")." `performers`.`performer_id` = '$performer'";
    }

    if ($to_date!="--Please select a date"){
        $sqlQuery.= ($counter==1?"WHERE":"AND")." DATE(`event`.`event_date`) <= '$to_date' ";
    }

    $sqlQuery .= " ORDER BY event_name ASC ";



    $sql = <<<SQL
$sqlQuery
SQL;

    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}


function getAllPerformers () {
    $sql = <<<SQL
SELECT *
FROM `performers`
ORDER BY first_name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getAllVenues () {
    $sql = <<<SQL
SELECT *
FROM `venue`
ORDER BY name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getPerformerID ($firstName, $lastName) {
    $sql = <<<SQL
SELECT *
FROM `performers`
WHERE `first_name` = '$firstName'
AND `last_name` = '$lastName'
SQL;
    $result = mysqli_fetch_assoc(get()->query($sql));

    return $result['performer_id'];
}

function addNewPerformer ($name, $description) {

    $split = explode(" ", $name);
    $firstName = $split[0];
    $lastName = $split[1];

    $sql = <<<SQL
INSERT INTO `performers` (first_name, last_name, description, created_at, updated_at)
VALUES ('$firstName', '$lastName', '$description','NOW()', 'NOW()')
SQL;

    return get()->query($sql);
}

function addEventDetails ($event_name, $venue_id, $performer_id, $category_id, $price, $event_date, $end_purchase_date, $created_by, $availability) {
    $sql = <<<SQL
INSERT INTO `event` (name, Venue_id, Performer_id, Category_id, price, event_date, end_purchase_date, availability, created_by, created_at, updated_at)
VALUES ('$event_name', '$venue_id', '$performer_id', '$category_id', '$price', '$event_date', '$end_purchase_date', '$availability', '$created_by', 'NOW()', 'NOW()')
SQL;

    return get()->query($sql);
}

function updateEventDetails ($user_id, $event_id, $event_name, $venu_id, $event_date, $event_end_date, $availability) {
    $sql = <<<SQL
UPDATE `event`
SET `name` = '$event_name', `Venue_id` = '$venu_id', `event_date` = '$event_date', `end_purchase_date` = '$event_end_date', `availability` = '$availability', `updated_at` = NOW()
WHERE `created_by` = '$user_id'
AND `event_id` = '$event_id'
SQL;

    return mysqli_fetch_assoc(get()->query($sql));
}

function getEventDetails ($event_id) {
    $sql = <<<SQL
SELECT event.event_id, event.name as event_name, event.price as event_price, event.event_date, event.end_purchase_date, event.availability as venue_capacity,
venue.name as venue_name, venue.city as venue_city, venue.address as venue_address, venue.venue_id,
venue.postcode as venue_postcode, venue.name as venue_name, CONCAT(performers.first_name, ' ', performers.last_name) as performer_name,
performers.description as performer_description, category.Name as category_name
FROM `event`
JOIN `venue` ON `venue`.`venue_id` = `event`.`Venue_id`
JOIN `performers` ON `performers`.`performer_id` = `event`.`Performer_id`
JOIN `category` ON `category`.`Category_id` = `event`.`Category_id`
WHERE `event_id` = '$event_id'
ORDER BY event_name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getListOfAllArtists () {
    $sql = <<<SQL
SELECT *
FROM `performers`
ORDER BY first_name ASC
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function getAllArtists () {
    $sql = <<<SQL
SELECT *
FROM `performers`
ORDER BY first_name ASC
LIMIT 5
SQL;
    $result = get()->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    return $data;
}

function updateUserPassword ($user_id, $newpassword) {
    $newpassword = hashh($newpassword);
    $updateStatement = <<<SQL
UPDATE `user`
SET `password` = '$newpassword'
WHERE `user_id` = '$user_id'
SQL;
    return mysqli_fetch_assoc(get()->query($updateStatement));
}
function updateUserPasswordByName($username, $newpassword) {
    $newpassword = hashh((string)$newpassword);
    $updateStatement = <<<SQL
UPDATE `user`
SET `password` = '$newpassword'
WHERE `username` = '$username'
SQL;
    return mysqli_fetch_assoc(get()->query($updateStatement));
}

function updateUserDetails ($user_id, $username, $first_name, $last_name, $email_address, $dob, $user_type) {
    $updateStatement = <<<SQL
UPDATE `user`
SET `username` = '$username', `first_name` = '$first_name', `last_name` = '$last_name', `email_address` = '$email_address', `dob` = '$dob', `user_type` = '$user_type'
WHERE `user_id` = '$user_id'
SQL;
    return mysqli_fetch_assoc(get()->query($updateStatement));
}

function user_data ($user_id) {
    $data = array();
    $user_id = (int)$user_id;
    $func_num_args = func_num_args();
    $func_get_args = func_get_args();
    if ($func_num_args > 1) {
        unset($func_get_args[0]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';

        $sql = <<<SQL
SELECT $fields
FROM `user`
WHERE `user_id` = '$user_id'
SQL;

        $result = get()->query($sql);

        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }

        return $data;
    }
}

function checkIfUserNameTaken ($username) {
    $sql = "SELECT COUNT(`user_id`) as count FROM `user` WHERE `username` = '$username'";

    $result = mysqli_fetch_assoc(get()->query($sql));

    return ($result['count'] == 1 ? true : false); //this will return true when there is already someone in the DB using that username
}

function checkIfEmailTaken ($emailaddress) {
    $sql =  "SELECT * FROM `user` WHERE `email_address` = '$emailaddress'";

    $result = mysqli_fetch_assoc(get()->query($sql));

    return (empty($result) ? false : true);
}

function createUserRecord ($userData) {
    array_walk($userData, 'array_sanitize');

    $chosenPassword = $userData['retype_password'];

    if (isset($userData['retype_password'])) {
        unset($userData['retype_password']);
    }


    // $userData['password']=hashh($user_data['password']);
    //!!!!!!!!
    $userData['created_at'] = date('Y-m-d H:m:s');
    $userData['updated_at'] = date('Y-m-d H:m:s');

    $data = '`' . implode('`, `', array_keys($userData)) . '`';
    $fields= '\''.implode("','",$userData).'\'';

    $sql = "INSERT INTO `user` ($data) VALUES ($fields)";

    $result = get()->query($sql);

    mail($userData['email_address'],'Successfully Created Account !',"Hello " . $userData['first_name'] . ",\n\nYou have successfully created your online account, here is your login credentials below, please keep them safe:\n\n Username : ".$userData['username']." \n Password : ".$chosenPassword." ",'From: info@musicforall.com');

    return ($result ? "SUCCESS" : "FAILED");
}

function user_logged_in () {
    return (isset($_SESSION['user_id'])) ? true : false;
}

function getEventFromEventID ($event_id) {
    $sql = "SELECT *FROM `event` WHERE `event_id` = '$event_id'";

    $result = mysqli_fetch_assoc(get()->query($sql));

    return $result;
}

function getCategoryFromCategoryID ($category_id) {
    $sql = <<<SQL
SELECT *
FROM `category`
WHERE `Category_id` = '$category_id'
SQL;
    $result = mysqli_fetch_assoc(get()->query($sql));

    return $result;
}

function getArtistFromPerformerID ($performer_id) {
    $sql = <<<SQL
SELECT *
FROM `performers`
WHERE `performer_id` = '$performer_id'
SQL;
    $result = mysqli_fetch_assoc(get()->query($sql));

    return $result;
}

function getUserIDFromUserName ($username) {
    $sql = <<<SQL
SELECT *
FROM `user`
WHERE `username` = '$username'
SQL;
    $result = mysqli_fetch_assoc(get()->query($sql));

    return $result['user_id'];
}

function getUserIDFromEmail($email) {
    $sql = <<<SQL
SELECT *
FROM `user`
WHERE `email_address` = '$email'
SQL;
    $result = mysqli_fetch_assoc(get()->query($sql));

    return $result['user_id'];
}

function login ($username, $password) {

    $sql = <<<SQL
SELECT *
FROM `user`
WHERE `username` = '$username'

SQL;

    $result = mysqli_fetch_assoc(get()->query($sql));
    // $hash=$result['password'];
    // $pass=password_verify($password, $hash);
    $pass = ($password == $result['password']);
    if (!empty($result)){
        return ($pass ? $result['user_id']: 0);
    }


}


function forgetUserDetails ($email_address) {
    //Since using hash, implement password reset system instead of sending password by email.
    $sql = "
SELECT *
FROM `user`
WHERE `email_address` = '$email_address'";

    $result = mysqli_fetch_assoc(get()->query($sql));

    if (!empty($result)) {
        mail($result['email_address'],'Password Retrieval',"Hello " . $result['first_name'] . ",\n\nYou have recently requested to view your login credentials, please keep them safe:\n\n Username : ".$result['username']." \n Password : ".$result['password']." ",'From: info@musicforall.com');
        return true;
    }


    return false;
}

///////////////////////////////////////////////////////////////////////////////////////////
//
//    Tried to hash passwords and implement a security question/answer system,
//    but the problem was that the password_verify() builtin function was always
//    returning false for some reason in the login.
//
///////////////////////////////////////////////////////////////////////////////////////////

// function getSecretQuestion($email_address){
//         $sql = "SELECT *
// FROM `user`
// WHERE `email_address` = '$email_address'";

//     $result = mysqli_fetch_assoc(get()->query($sql));

//     if(!empty($result)){
//         return $result['secret_question'];
//     }
// }

// function checkSecretAnswer($email_address,$answer){
//     $sql = "SELECT *
// FROM `user`
// WHERE `email_address` = '$email_address'";

//     $result = mysqli_fetch_assoc(get()->query($sql));
//     return ($result['secret_answer']==$answer?true:false);
// }




// NOT HASHING PASSWORDS BECAUSE PASSWORD_VERIFY ALWAYS RETURNS FALSE!!!!!!!!!!!!!!
// function hashh($password){
//     return password_hash($password, PASSWORD_DEFAULT);
// }

