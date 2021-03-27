<?php
include("conn.inc.php");
if (isset($_REQUEST["a"])) {

    $a = $_REQUEST["a"];
    $select = $conn->query ("SELECT * FROM blogs WHERE id='$a'");
    $info = mysqli_fetch_assoc($select);
    $image = $info ["image"];
    $del_image = unlink("../blogs/images/$image");
    $sql = $conn->query ("DELETE FROM blogs WHERE id =$a");
    if ($sql) {
        if ($del_image) {
            echo "your post has been deleted!";
        }
    } else {
        echo "failure! ";
    }
}