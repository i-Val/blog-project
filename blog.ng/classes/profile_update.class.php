<?php
/**
*
*/
//name, temp name, given name, description and path to the file



//class begins
class ProfileUpdate
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
    public  function profile_update ($p, $c, $h, $e, $d, $a, $username) {
        /* #Check if file parameters were inserted in DB successfully*/
        /*$profession = $_POST['profession'];
        $city = $_POST['city'];
        $homeTown = $_POST['home-town'];
        $education = $_POST['education'];
        $description = $_POST['description'];
        $avatar = basename($_FILES["avatar"]["name"]);
*/

        /*Getting file extension in lowercase*/
        $ext = explode(".",
            $a);
        $file_ext = strtolower(end($ext));

        /*Permitted file formats*/

        $allowed = array("png",
            "jpg",
            "jpeg", "webp");

        //if format is allowed
        if (in_array($file_ext, $allowed)) {
            //create insert query
            $sql = "INSERT INTO profile (profession, city, homeTown, education, description, avatar, username)
VALUES ('$p', '$c','$h','$e', '$d', '$a', '$username');";
            echo "sql statement ran!";
        } else {
            echo "avatar is not an image!";
            exit ();
        }
        //if file name & details get inserted successfully...
        $conn = new mysqli($this->host,
            $this->username,
            $this->password,
            $this->database);
        echo "this is the problem";

        return  $conn->query($sql);
        echo "this is anothet problem!";

        /*....Upload file to directory*/
        $dir = "../users/avatars/";
        $tname = $a;
        $target_file = $dir .$a;

        echo "this is the third problem!";


        if (move_uploaded_file($tname, $target_file)) {

            echo ($target_file);

            echo "Profile updated successfully";
        }
    }
    //end of class
}