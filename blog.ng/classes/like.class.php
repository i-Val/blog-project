<?php
/**
*
*
*/

/*Database CLASS*/
//Connect
//Insert
//Delete
//Clear
//Select
//Select all

class Likes
{

    /*INITIALIZE ALL THE VARIABLES NEEDED FOR DB CONNECTION
    */
    public function __construct($hst, $usrnm, $pass, $db) {
        $this->host = $hst;
        $this->username = $usrnm;
        $this->password = $pass;
        $this->database = $db;
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        //$this->conn;
    }
    /*connect method*/
    function connect () {

        if ($this->conn) {
            echo "Suceess!!!!!";
        } else {
            echo "erooroo";
        }
    }
    /*this method checks if the user has liked this image before*/
    function check_liked($table, $title, $value) {
        $this->table = $table;
        $this->user = $title;
        $this->liked_pic = $value;

        $conns = $this->conn;
        $sql = "SELECT * FROM $this->table WHERE user = '$this->user' AND liked_pic = '$this->liked_pic'";
        $res = mysqli_query($conns, $sql);
        $row = mysqli_num_rows($res);
        echo $row;

        return $row;


    }

    //this method check how many like a particular image has
    function check_likes($table, $id) {
        $this->table = $table;
        $this->filename = $id;

        $conns = $this->conn;
        $sql = "SELECT * FROM $this->table WHERE id = '$this->filename'";
        $res = mysqli_query($conns, $sql);
        $row = mysqli_fetch_assoc($res);

        return $row['likes'];

    }


    /* This method registers  a new user and the pic he liked into the likes table*/
    function reg_like($table, $n, $sn) {
        $this->table = $table;
        $this->user = $n;
        $this->liked_pic = $sn;


        $sql = "INSERT INTO ".$this->table."(user, liked_pic)
VALUES ('".$this->user."','".$this->liked_pic. "')";
        $conns = $this->conn;
        #Check for any error in query
        if ($conns->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    //this method updates the number of likes for each image
    function like($table, $new_likes, $liked_pic) {
        $this->table = $table;
        $this->new_likes = $new_likes;
        $this->filename = $liked_pic;
        $conns = $this->conn;
        $sql = "UPDATE $this->table SET likes='$this->new_likes'
 WHERE id='$this->filename'";
        if ($conns->query($sql) === TRUE) {
            echo "row updated!";
        } else {
            echo "Error: " . $sql . "<br>" . $conns->error;
        }

    }

    /*Delete row
    function delete_row($table, $title, $value) {
        $this->table = $table;
        $this->title = $title;
        $this->value = $value;
        $conns = $this->conn;
        $sql = $conns->query("DELETE  FROM$this->table WHERE $this->title = '$this->value';");
        if (!$sql) {
            echo $conns->error;
            echo "<br>";
        } else {
            echo "delete successful! ";
        }
    }

    /*Clear table
    function delete_all($table) {
        $this->table = $table;
        $conns = $this->conn;
        $sql = $conns->query("DELETE FROM$this->table WHERE name='bile' OR 1=1;");
        if (!$sql) {
            echo $conns->error;
            echo "<br>";
        } else {
            echo "delete successful! ";
        }
        //Method end
    }*/

    //CLASS END
}

$database = new Likes("localhost", "root", "", "valpoint");

?>