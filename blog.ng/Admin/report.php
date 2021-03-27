<?php
include("../includes/conn.inc.php");
$a = $_REQUEST["a"];
$b = $_SESSION["profile-name"];

echo $a;
echo $b;

$sql = 'INSERT INTO reported_blogs (blog_id, reporter) VALUES ("'.$a.'", "'.$b.'")';
if ($conn->query ($sql)) {
    echo "success!";
} else {
    echo "failure!";
}