<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section class="upload">

        <h3>Upload Picture</h3>
        <form action="../includes/avatar-edit.inc.php" method="post" enctype="multipart/form-data">
            <input type="file" name="pic" id="pic" />

            <input type="submit" value="submit" />
        </form>
    </section>
</body>
</html>