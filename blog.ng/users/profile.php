<?php
include('../includes/conn.inc.php');
include('../includes/profile-select.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/materialize.css">
    <title>Document</title>
</head>
<body>
    <header class="profile-header">
        <div>
            <h3><?php echo($_SESSION ['profile-name']); ?></h3>
            <img src="avatars/<?php echo $avatar ["filename"] ?>" alt="file....">
        </div>
    </header>
    <div class="container">
        <ul>
            <li>profession: <?php echo $user ["professional"] ?></li>
            <li>date of birth</li>
            <li>home town: <?php echo $user ["homeTown"] ?></li>
            <li>current city: <?php echo $user ["city"] ?></li>
            <li>education: <?php echo $user ["education"] ?></li>
        </ul>
        <div class="about">
            <p>
                <?php echo $user ["description"] ?>
            </p>
        </div>
    </div>
    <a href="profile-edit.php">edit profile</a>
    <a href="avatar-edit.php">edit profile pic</a>
</body>
</html>