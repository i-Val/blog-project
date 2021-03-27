<?php
include('../includes/conn.inc.php');
include('../includes/profile-select.inc.php');
include("../classes/avatar.class.php");
//instantiate class
$username = $_SESSION['profile-name'];
$gallery = new Filess ("localhost", "root", "", "blog");
//call upload method
if ($check > 0) {
    // code...
    if ($check_avatar > 0) {
        // code...
        $dir = "../users/avatars/";
        $old_file = $dir.$avatar["filename"];
        $gallery->image_update ($username, $old_file);
    } else {
        // code...
        $gallery->image_upload ($username);
    }
} else {
    echo "who the heck are you?";
}
?>