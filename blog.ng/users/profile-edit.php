<?php
include('../includes/conn.inc.php');
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
    <!--SIGN-UP FORM-->
    <div class="row">
        <form method="post" action="../includes/profile-edit.inc.php" class="col s12">
            <!--#$$////////-->
            <div class="row">
                <div class="input-field col s6">
                    <input id="profession" type="text" class="validate" name="profession">
                    <label for="profession">Profession</label>
                </div>
            </div>



            <div class="row">
                <div class="input-field col s6">
                    <input id="city" type="text" class="validate" name="city">
                    <label for="city">City</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="home" type="text" class="validate" name="home">
                    <label for="home">Home</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="education" type="text" class="validate" name="education">
                    <label for="education">Education</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="description" type="text" class="validate" name="description">
                    <label for="description">Email</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
            </div>
            <input id="submit" class="btn" type="submit" name="submit" value="submit" />
        </form>
    </div>

</body>
</html>