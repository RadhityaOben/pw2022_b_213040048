<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>

    <?php if( isset($_POST["sub"])) : ?>
        <h1>Welcome Home <?= $_POST["nick"]; ?></h1>
    <?php endif; ?>

    <form action="latihan4.php" method="POST">
        Input your Nickname :
        <input type="text" name="nickname">
        <br>
        <button type="submit" name="submit">Send!</button>
    </form>
    <br>
    <form action="" method="POST">
        Input Your Nickname :
        <input type="text" name="nick">
        <br>
        <button type="submit" name="sub">Submit</button>
    </form>
</body>
</html>