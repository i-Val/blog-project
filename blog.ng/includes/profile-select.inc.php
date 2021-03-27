<?php
include("../classes/database.class.php");

$user = mysqli_fetch_assoc($database->select_one ("profile", "username", $_SESSION["profile-name"]));
$check = mysqli_num_rows($database->select_one ("profile", "username", $_SESSION["profile-name"]));
$avatar = mysqli_fetch_assoc($database->select_one ("avatar", "username", $_SESSION["profile-name"]));
$check_avatar = mysqli_num_rows($database->select_one ("avatar", "username", $_SESSION["profile-name"]));


?>