<?php 
    include ('libs/connection.inc.php');

    // NUGGETS
    if(isset($_POST['nuggets'])) {
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
    <h1>Nuggets</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <?php echo $message ?? null ?>
        <input type="file" name="nuggets" id="nuggets">
        <input type="text" name="title" id="title" placeholder="Input the title" required>
        <input type="submit" value="Submit" name="nuggets">
    </form>

    <h1>Upcoming Events</h1>
    <?php $events = new uploadEvent($pdo) ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div><label for="Event">Event:</label>
        <input type="text" name="event" id="event"></div>
        <?= $events->getErrors('event') ?><br>
        <div><label for="Date">Start Date:</label>
        <input type="date" name="startDate" id="startDate"></div>
        <?= $events->getErrors('date') ?><br>
        <div><label for="Date">End Date:</label>
        <input type="date" name="endDate" id="endDate"></div>
        <?= $events->getErrors('date') ?><br>
        <div><label for="Venue">Venue:</label>
        <input type="text" name="venue" id="venue"></div>
        <?= $events->getErrors('venue') ?><br>
        <div><label for="Time">Start Time:</label>
        <input type="time" name="startTime" id="startTime"></div>
        <?= $events->getErrors('time') ?><br>
        <div><label for="End Time">End Time:</label>
        <input type="time" name="endTime" id="endTime"></div>
        <?= $events->getErrors('time') ?><br>
        <input type="submit" value="Submit" name="events">
    </form>

    
</body>
</html>