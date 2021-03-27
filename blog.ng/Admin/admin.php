<!DOCTYPE html>
<?php
//include("../includes/conn.inc.php");
$sqls = $conn->query ("SELECT * FROM reported_blogs");
$num_reports = mysqli_num_rows($sqls);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h2>Welcome Admin</h2>
        <p>
            this is the admin page
        </p>
    </header>
    <div class="reports">

    </div>
    <div class="view">

    </div>
    <div class="delete">
        <form action="includes/delete.inc.php" method="post">
            <input type="text" name="blog" placeholder="delete blog...">
            <input class="btn" type="submit" name="delete-blog" value="submit">
        </form>
        <form action="includes/delete.inc.php" method="post">
            <input type="text" name="user" placeholder="delete user...">
            <input class="btn" type="submit" name="delete-user" value="submit">
        </form>
    </div>

    <div class="clear">
        <form action="includes/delete.inc.php" method="post">
            <input class="btn" type="submit" name="clear-blogs" value="clear blogs">
            <br>
            <br>
            <br>
            <input class="btn" type="submit" name="clear-users" value="clear users">
        </form>
    </div>
    <div class="reports">
        <h3>You have <?php echo $num_reports; ?>reports!</h3>
        <p>
            <?php
            while ($res_reports = mysqli_fetch_assoc($sqls)) {
                $a = $res_reports["blog_id"];

                echo $res_reports["reporter"]; echo 'reported a <button onclick="view_reported ('.$a.')">post</button>';
                echo "<br>";
            } ?>
        </p>
    </div>
    <script src="../js/main.js" type="text/javascript"></script>
</body>
</html>