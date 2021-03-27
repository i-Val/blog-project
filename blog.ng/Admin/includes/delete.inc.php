<?php
#Import DB connection
include("../../includes/conn.inc.php");

#If "clear" button is clicked
if (isset($_POST['clear-blogs'])) {
    $blogname = "";
    $sql = "DELETE FROM blogs WHERE title='$blogname' OR 1=1";

    if ($conn -> query($sql)) {
        echo "database cleared!";
        exit();
    } else {
        echo $conn -> error;
    }
}
if (isset($_POST['clear-users'])) {
    $username = "";
    $sql = "DELETE FROM users WHERE username='$username' OR 1=1";

    if ($conn -> query($sql)) {
        echo "database cleared!";
    } else {
        echo $conn -> error;
    }
    exit();
}
if (isset($_POST['clear-images'])) {
    $filename = "";
    $sql = "DELETE FROM images WHERE givenName='$filename' OR 1=1";

    if ($conn -> query($sql)) {
        echo "database cleared!";
    } else {
        echo $conn -> error;
    }
    exit();
}


/*There are three buttons in the delete form. These buttons have names, delete-pic, delete-audio and delete-video*/

/*Set the filename & sql based on button clicked*/
if (isset($_POST['delete-blog'])) {
    $blog_id = $_POST['blog'];

    $sql = "DELETE  FROM blogs WHERE id ='$blog_id'";
} else if (isset($_POST['delete-user'])) {
    $username = $_POST['user'];

    $sql = "DELETE  FROM users WHERE user ='$username'";
}

#Execute query
if ($conn->query($sql)) {
    echo "record deleted!";
} else {
    echo "didn't work! <br>";
    echo $conn->error;
}


?>