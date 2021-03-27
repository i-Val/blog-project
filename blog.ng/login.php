<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/aos.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/materialize.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <title>Login</title>
</head>
<body>
    <form action="includes/login.inc.php" method="post">
        <div class="form-field">
            <label for="username">username</label>
            <input type="text" name="username" id="username" />
        </div>
        <div class="form-field">
            <label for="password">password</label>
            <input type="text" name="password" id="pasaword" />
        </div>
        <input type="submit" name="submit" id="submit" value="submit"/>
    </form>
</body>
</html>