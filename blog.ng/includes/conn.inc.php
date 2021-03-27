<?php
session_start();
if (!isset ($_SESSION["profile-name"])) {
    $_SESSION["profile-name"] = "guest";
}
$host = "localhost";
$user = "root";
$pass = "";
$database = "blog";

$conn = new mysqli($host, $user, $pass, $database);
$conn;



?>