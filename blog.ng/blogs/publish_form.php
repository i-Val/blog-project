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
    include('../includes/conn.inc.php');
    if ($_SESSION['name'] === "guest") {
        echo "login to publish post!";
    } else {
        echo
        '<form action="../includes/publish.inc.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image" />
        <input type="text" name="title" id="title" />
        <input type="text" name="body" id="body" />
        <input type="submit" name="submit" id="submit" value="submit" />
    </form>';
    }
    ?>
</body>
</html>