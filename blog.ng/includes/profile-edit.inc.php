<?php
include('../includes/conn.inc.php');
include('../includes/profile-select.inc.php');



if (isset($_POST["submit"])) {
    // session_start();
    $profession = $_POST["profession"];
    $city = $_POST["city"];
    $hometown = $_POST["home"];
    $education = $_POST["education"];
    $description = $_POST["description"];
    $username = $_SESSION ['profile-name'];

    if ($check < 1) {
        // code...
        $database->update_profile ("profile", $profession, $city, $hometown, $education, $description, $username);
        echo $username;

    } else {
        $database->update_profile2 ("profile", $profession, $city, $hometown, $education, $description, $username);
    }

}