<?php 
    include ('libs/connection.inc.php');
    if(isset($_POST['submit'])) {
        uploadNugget();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <?php echo $message ?? null ?>
        <input type="file" name="nuggets" id="nuggets">
        <input type="text" name="title" id="title" placeholder="Input the title" required>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>