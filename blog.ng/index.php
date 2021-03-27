<?php
include('includes/conn.inc.php');
if (isset($_SESSION['name']) && $_SESSION['name'] != "guest") {
    echo '<a href="users/profile.php">'.$_SESSION['name'].'</a>';
} else {
    $_SESSION["name"] = "guest";
    echo $_SESSION["name"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blog.ng</title>
    <link rel="stylesheet" href="css/normalize.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/aos.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/materialize.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
    <!--BODY STARTS HERE-->
    <!--NAVIGATION-->

    <header>
        <div class="container center">
            <h1>Lorem Ipsum</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, deserunt.
            </p>
            <?php
            if (isset($_SESSION["name"]) && $_SESSION["name"] != "guest") {
                echo   '<p>
                <a class="btn" href="includes/logout.inc.php">Logout</a>
                </p>';
                echo   '<p>
                <a class="btn" href="blogs/publish_form.php">write blog</a>
                </p>';
            } else {
                echo   '<p>
                <a class="btn" href="login.php">Login</a>
                </p>';
            }
            ?>
            <p>
                <a class="btn" href="blogs/blogs.php">view blog</a>
            </p>
            <?php
            if ($_SESSION["name"] == "Admin") {
                echo '<p>
                <a class="btn" href="admin/index.php">admin page</a>
            </p>';
            }
            ?>
        </div>
    </header>

    <!--INTRO-->

    <div class="container center">
        <h2>Lorem</h2>
        <section class="intro section row">
            <div class="col s12 m4">
                <img class="responsive-img" src="images/intro.jpg" alt="">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas esse tenetur accusantium facere id dignissimos sapiente eaque ipsa, ratione architecto.
                </p>
            </div>
        </section>
        <section class="blog-preview">
            <?php
            $conn = new mysqli("localhost", "root", "", "blog");

            $sql = $conn->query("SELECT * FROM blogs LIMIT 3;");
            while ($res = mysqli_fetch_assoc($sql)) {
                $a = $res ["id"];
                echo "<div>";
                echo "<h4>".$res['title']."</h4>";
                echo "<p>".$res['body']."</p>";
                echo "<br>";
                echo "<button type='button' class='action btn' onclick='goThere2 (\"$a\")'> more </button>";
                echo "</div>";
            }
            ?>

        </section>

        <!--SIGN-UP FORM-->
        <section>
            <h4>Sign up</h4>
            <div class="row">
                <form method="post" action="includes/signup.inc.php" class="col s12">
                    <!--#$$////////-->
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" name="firstname">
                            <label for="first_name">First Name</label>
                        </div>
                    </div>



                    <div class="row">
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="lastname">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" type="text" class="validate" name="username">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email">Email</label>
                            <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                        </div>
                    </div>
                    <input id="submit" class="btn" type="submit" name="submit" value="submit" />
                </form>
            </div>
        </section>


        <!--FOOTET-->
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">
                            You can use rows and columns here to organize your footer content.
                        </p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2014 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>

        <!--JAVASCRIPT-->
        <script src="js/aos.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/anime.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/materialize.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/main.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>