<?php
//including database connection
include('../includes/conn.inc.php');
include('../classes/publish.class.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    <h2>Blogs</h2>
    <p>
        Welcome to our blog.
    </p>
    <div class="gframer">
        <?php
        $blog = new Blog ("localhost", "root", "", "blog");
        $blog->select_blogs ("blogs");
        ?>



    </div>
    <div id="check"></div>
    <script src="../js/main.js" type="text/javascript">
    </script>
</body>
</html>