<?php
/**
*
*/
//name, temp name, given name, description and path to the file
$vid = $_FILES["pic"]["name"];
$tname = $_FILES["pic"]["tmp_name"];
$dir = "../users/avatar/";


//class begins
class Filess
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
        $this->conn = new mysqli($this->host,
            $this->username,
            $this->password,
            $this->database);
    }

    //this method uploads the image
    public  function image_upload ($username) {
        $username = $username;
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
            $sql = "INSERT INTO avatar (filename, username)
VALUES ('$fname', '$username')";
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

            echo ($target_file);
            echo "New record created successfully";

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
    //end of class
}