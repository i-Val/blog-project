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
    $a = $_REQUEST["a"];
    $sql = 'SELECT * FROM blogs WHERE id = "'.$a.'"';
    $sqls = $conn->query ($sql);
    $res = mysqli_fetch_assoc($sqls);
    echo "<h2>".$res ['title']."</h2>";
    echo "<h4>".$res ['body']."</h4>";

    echo '<button onclick="delete_reported ('.$a.')">delete post</button>';
    echo '<button onclick="keep_reported ('.$a.')">keep post</button>';

    ?>

    <script src="../js/main.js" type="text/javascript"></script>
</body>
</html>