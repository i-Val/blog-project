<?php
/**
*
*/
//name, temp name, given name, description and path to the file
$dir = "../blogs/images/";


//class begins
class Blog
{

    /**
    *
    */


    public function __construct($hst, $usrnm, $pass, $db) {
        // db connection code
        $this->host = $hst;
        $this->username = $usrnm;
        $this->password = $pass;
        $this->database = $db;
        $conn = new mysqli($this->host,
            $this->username,
            $this->password,
            $this->database);
    }

    //this method uploads the image
    public  function publish ($username, $title, $body, $blog_image) {
        $username = $username;
        $title = $title;
        $body = $body;

        $conn = new mysqli($this->host,
            $this->username,
            $this->password,
            $this->database);


        /* #Check if file parameters were inserted in DB successfully*/
        $blog_image = $blog_image;


        /*Getting file extension in lowercase*/
        $ext = explode(".",
            $blog_image);
        $file_ext = strtolower(end($ext));

        /*Permitted file formats*/

        $allowed = array("png",
            "jpg",
            "jpeg", "webp");

        //if format is allowed
        if (in_array($file_ext, $allowed)) {
            //create insert query
            $sql = "INSERT INTO blogs (author,title,body,image)
VALUES ('$username', '$title', '$body', '$blog_image')";
            echo " sql clear";
        } else {
            echo "file is not an image!";
            exit ();
        }
        echo"clear!";
        //if file name & details get inserted successfully...
        if ($conn->query($sql) === TRUE) {

            /*....Upload file to directory*/
            $dir = "../blogs/images/";
            $tname = $_FILES["image"]["tmp_name"];
            $target_file = $dir . basename($_FILES["image"]["name"]);


            move_uploaded_file($tname, $target_file);

            echo ($target_file);
            echo "New record created successfully";

        } else {
            echo "didn't work o!". $conn->error;
        }
    }

    public function image_update ($username, $old_file) {
        $username = $username;
        $old_file = $old_file;
        /* #Check if file parameters were inserted in DB successfully*/
        $fname = basename($_FILES["pic"]["name"]);


        /*Getting file extension in lowercase*/
        $ext = explode(".",
            $fname);
        $file_ext = strtolower(end($ext));

        /*Permitted file formats*/

        $allowed = array("png",
            "jpg",
            "jpeg", "webp");

        //if format is allowed
        if (in_array($file_ext, $allowed)) {
            //create insert query
            $sql = "UPDATE  avatar SET filename = '$fname' WHERE username = '$username'";
        } else {
            echo "file is not an image!";
            exit ();
        }
        //if file name & details get inserted successfully...
        if ($this->conn->query($sql) === TRUE) {

            /*....Upload file to directory*/
            $dir = "../users/avatars/";
            $tname = $_FILES["pic"]["tmp_name"];
            $target_file = $dir . basename($_FILES["pic"]["name"]);


            move_uploaded_file($tname, $target_file);
            if (file_exists($old_file)) {
                // code...
                unlink($old_file);
            }

            echo "New record created successfully";

        }
    }

    /*Select method(select all)*/
    function select_blogs($table, $conn) {
        $this->table = $table;
        $conn = $conn;
        $sql = $conn->query("SELECT * FROM ".$this->table.";");
        while ($res = mysqli_fetch_assoc($sql)) {
            echo "<h2>". $res["title"] ."</h2>";
            echo '<img class="blogimage" src="../blogs/images/'. $res["image"].'" alt="image.jpg" />';
            echo "<br>";
            echo "<p>". $res["body"] ."</p>";
            $a = $res["author"];
            echo "<button onclick='goThere (".$a.")'> more </button>";
        }

    }
    /*Select method(select one blog)*/
    function select_one_blog($table, $username) {
        $this->table = $table;
        $conn = new mysqli("localhost", "root", "", "blog");
        $username = $username;
        $sql = $conn->query("SELECT * FROM ".$this->table." WHERE id = '".$username."';");
        while ($res = mysqli_fetch_assoc($sql)) {
            echo "<h2>". $res["title"] ."</h2>";
            echo '<img class="blogimage" src="../blogs/images/'. $res["image"].'" alt="image.jpg" />';
            echo "<br>";
            echo "<p>". $res["body"] ."</p>";
            echo "<a onClick='goThere (". $res ["author"].")'> more>></a>";
        }

    }

    //end of class
}