<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>

    <?php
    include('../includes/conn.inc.php');
    $username = $_REQUEST["a"];
    $a = $_SESSION["profile-name"];
    include("../classes/publish.class.php");
    $blog = new Blog ("localhost", "root", "", "blog");
    $blog->select_one_blog ("blogs", $username);
    ?>
    <script src="../js/main.js" type="text/javascript">

    </script>
</body>
</html>