<?php
include("conn.inc.php");
if (isset($_REQUEST["a"])) {

    $a = $_REQUEST["a"];
    $sql = $conn->query ("DELETE FROM reported_blogs WHERE blog_id =$a");
    if ($sql) {
        echo "punished!";
    } else {
        echo "failure! ";
    }
}

if (isset($_REQUEST["b"])) {

    $b = $_REQUEST["b"];
    $sql = $conn->query ("DELETE FROM reported_blogs WHERE blog_id =$b");
    $sql2 = $conn->query ("DELETE FROM blogs WHERE id =$b");
    if ($sql) {
        echo "punished!";
        if ($sql2) {
            echo   "complete !!";
        }
    } else {
        echo "failure! ";
        echo $conn->error;
    }
}