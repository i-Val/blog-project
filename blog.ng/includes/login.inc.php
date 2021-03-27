<?php
if (isset ($_POST ["submit"])) {
    //Include DB connection file & database class
    include('conn.inc.php');
    include('../classes/database.class.php');

    //Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    //assign login method to a variable
    $logged = $database->login ("users", "$username", "$password");


    //if there is no such user, stop here
    if ($logged == 0) {
        echo "INTRUDER ALERT!!";
    } else {
        //Assign the value of session name to username(login user)

        $_SESSION['name'] = $username;
        echo("Welcome ".$_SESSION['name']."!");
        //redirect user to home page
        header("Location: ../index.php");
    }

    //Close connection
    $conn->close();
}


?>