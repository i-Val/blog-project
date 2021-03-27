<?php
/**
*
*
*/

/*Database CLASS has the following methods*/
//Connect
//Insert
//Delete
//Clear
//Select
//Select all

class Database
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
    /*Select method(select all)*/
    function select_all($table) {
        $this->table = $table;
        $conns = $this->conn;
        $sql = $conns->query("SELECT * FROM ".$this->table.";");
        while ($res = mysqli_fetch_assoc($sql)) {
            echo $res["name"];
            echo "<br>";
        }

    }
    /*Select one row*/
    function select_one($table, $title, $value) {
        $this->table = $table;
        $this->title = $title;
        $this->value = $value;

        $conns = $this->conn;
        $sql = $conns->query("SELECT * FROM ".$this->table." WHERE ".$this->title." = '".$this->value."'");
        return  $sql;


    }
    /*select one row and print one value*/
    function login($table, $title, $value) {
        $this->table = $table;
        $this->user = $title;
        $this->password = $value;

        $conns = $this->conn;
        $sql = "SELECT * FROM $this->table WHERE user = '$this->user' AND pass = '$this->password'";
        $res = mysqli_query($conns, $sql);
        $row = mysqli_fetch_assoc($res);
        $pass2 = $row ['pass'];
        if (preg_match("/^".$pass2."$/", $this->password)) {
            $_SESSION["profile-id"] = $row ["id"];
            $_SESSION["profile-name"] = $row ["first_name"];
            $_SESSION["profile-lastname"] = $row ["last_name"];
            return 1;
        } else {

            return 0;
            //$row = mysqli_num_rows($res);

            //return $row;
        }

    }

    function logout () {

        #Set session to an empty array thus clearing it
        session_start();
        $_SESSION = array();

        #redirect the user to the home page
        header("Location: ../index.php");

        #logout message
        $welcome = "You are now logged out!";


    }
    /*select one row and print one value*/
    function select_one_index($table, $title, $value, $index) {
        $this->table = $table;
        $this->title = $title;
        $this->value = $value;
        $this->index = $index;

        $sql = $this->conn->query("SELECT * FROM$this->table WHERE $this->title = '$this->value';");

        if ($sql) {
            echo "sql worked!";
        } else {
            echo "sql failed! ";
        }

        while ($res = mysqli_fetch_assoc($sql)) {
            echo "SELECT ONE";
            echo $res["$this->index"];
            echo "<br>";
        }


    }
    /*select all row and print one value each*/
    function select_all_index($table, $index) {
        $this->table = $table;
        $this->index = $index;

        $conns = $this->conn;
        $sql = $conns->query("SELECT * FROM$this->table");
        while ($res = mysqli_fetch_assoc($sql)) {
            echo "SELECT ONE";
            echo $res["$this->index"];
            echo "<br>";
        }

    }

    /* Insert method*/
    function insert_into($table, $n, $sn, $un, $pw, $em) {
        $this->table = $table;
        $this->name = $n;
        $this->surname = $sn;
        $this->username = $un;
        $this->password = $pw;
        $this->email = $em;


        $sql = "INSERT INTO ".$this->table."(first_name, last_name, user, pass,email)
VALUES ('".$this->name."', '".$this->surname."', '".$this->username."','".$this->password. "','". $this->email."')";
        $conns = $this->conn;
        #Check for any error in query
        if ($conns->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conns->error;
        }
    }
    /* update method*/
    function update_profile($table, $n, $sn, $un, $pw, $em, $uun) {
        $this->table = $table;
        $this->name = $n;
        $this->surname = $sn;
        $this->username = $un;
        $this->password = $pw;
        $this->email = $em;
        $this->username = $uun;


        $sql = "INSERT INTO ".$this->table."(professional, city, hometown, education ,description, username)
VALUES ('".$this->name."', '".$this->surname."', '".$this->username."','".$this->password. "','". $this->email."','". $this->username."')";
        $conns = $this->conn;
        #Check for any error in query
        if ($conns->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conns->error;
        }
    }

    /*update method*/
    function update_profile2($table, $v1, $v2, $v3, $v4, $v5, $username) {
        $this->table = $table;
        $this->v1 = $v1;
        $this->v2 = $v2;
        $this->v3 = $v3;
        $this->v4 = $v4;
        $this->v5 = $v5;

        $this->username = $username;
        $conns = $this->conn;
        $sql = "UPDATE $this->table SET professional='$this->v1', homeTown='$this->v2', city='$this->v3', education='$this->v4', description ='$this->v5'
 WHERE username ='$username'";
        if ($conns->query($sql) === TRUE) {
            echo "row updated!";
        } else {
            echo "Error: " . $sql . "<br>" . $conns->error;
        }

    }

    /*Delete row*/
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

    /*Clear table*/
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
    }

    //CLASS END
}

//instantiate class
$database = new Database("localhost", "root", "", "blog");

?>