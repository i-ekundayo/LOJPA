<?php
// function to upload nuggets
function uploadNugget() {
    global $message, $nuggets;
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $allowed_ext = ['jpg', 'png', 'jpeg', ];
    // check if file is empty
    if(!empty($_FILES['nuggets']['name'])) {
        $file_name = $_FILES['nuggets']['name']; 
        $file_tmp = $_FILES['nuggets']['tmp_name'];
        $file_size = $_FILES['nuggets']['size'];
        $target_dir = "nuggets/$file_name";


        // Get file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        // Check if file is an image
        if(in_array($file_ext, $allowed_ext)) {
            // Check file size
            if($file_size <= 10000000) {
                move_uploaded_file($file_tmp, $target_dir);
                $message = '<p style="color:green">File successfully uploaded</p>';

                $nuggets = new UploadNugget($file_name, $title);
            }  else {
                $message = '<p style="color:red">File is too large</p>';
            }
        } else {
            $message = '<p style="color:red">File is not an image</p>';
        }
    } else {
        $message = '<p style="color:red">Please choose a file</p>';
    }
}

// function to get and display nuggets
function getNuggets() {
    global $pdo;
    $sql = ("SELECT * FROM nuggets ORDER BY id DESC");
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $nuggets = $stmt->fetchAll();

    return $nuggets;
}


// function to set the events from the form
function setEvents() {
    $eventErr = $dateErr = $venueErr = $timeErr = '';
    
    $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_SPECIAL_CHARS);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
    $venue = filter_input(INPUT_POST, 'venue', FILTER_SANITIZE_SPECIAL_CHARS);
    $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($event)) {
        $eventErr = '<p style="color:red"> Please enter the name of the event';
    }
    if(empty($date)) {
        $dateErr = '<p style="color:red"> Please enter the date of the event';
    }
    if(empty($venue)) {
        $venueErr = '<p style="color:red"> Please enter the venue of the event';
    }
    if(empty($time)) {
        $timeErr = '<p style="color:red"> Please enter the time of the event';
    }

    return (object) ['event' => $event, 'date' => $date, 'venue' => $venue, 'time' => $time, 'eventErr' => $eventErr, 'dateErr' => $dateErr, 'venueErr' => $venueErr, 'timeErr' => $timeErr];
}