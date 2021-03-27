<?php
if (isset($_POST["submit"])) {
    require("../classes/database.class.php");
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $database->insert_into ("users", $firstname, $lastname, $username, $password, $email);

}