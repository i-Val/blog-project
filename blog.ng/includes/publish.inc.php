<?php
include("conn.inc.php");
include("../classes/publish.class.php");
$username = $_SESSION["profile-name"];
$blog_image = $_FILES["image"]["name"];
$title = $_POST["title"];
$body = $_POST["body"];

$blog = new Blog ("localhost", "root", "", "blog");
$blog-> publish ($username, $title, $body, $blog_image);