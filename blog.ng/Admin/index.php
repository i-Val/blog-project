<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    include("../includes/conn.inc.php");
    include("../includes/profile-select.inc.php");
    if ($_SESSION['profile-name'] == "Admin") {
        echo "<h1>".$user ['professional']."</h1>";
        include("admin.php");

    } else {
        echo  "<h1>".$user ['city']."</h1>";
    }

    ?>

</body>
</html>