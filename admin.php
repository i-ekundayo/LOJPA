<?php 
    include ('libs/connection.inc.php');
    if(isset($_POST['nuggets'])) {
        uploadNugget();
    }

    if(isset($_POST['events'])) {
        $setEvent = setEvents();
        $event = $setEvent->event;
        $date = $setEvent->date;
        $venue = $setEvent->venue;
        $time = $setEvent->time; 
        $eventErr = $setEvent->eventErr;
        $dateErr = $setEvent->dateErr;
        $venueErr = $setEvent->venueErr;
        $timeErr = $setEvent->timeErr;
        if(empty($eventErr) && empty($dateErr) && empty($venueErr) && empty($timeErr)) {
            $event1 = new UploadEvent($event, $date, $venue, $time);
            echo $event1->event;
            echo $event1->date;
            echo $event1->venue;
            echo $event1->time;
        }
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
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div><label for="Event">Event:</label>
        <input type="text" name="event" id="event"></div>
        <?= $eventErr ?? null ?><br>
        <div><label for="Date">Date:</label>
        <input type="date" name="date" id="date"></div>
        <?= $dateErr ?? null ?><br>
        <div><label for="Venue">Venue:</label>
        <input type="text" name="venue" id="venue"></div>
        <?= $venueErr ?? null ?><br>
        <div><label for="Time">Time</label>
        <input type="time" name="time" id="time"></div>
        <?= $timeErr ?? null ?><br>
        <input type="submit" value="Submit" name="events">
    </form>

    
</body>
</html>