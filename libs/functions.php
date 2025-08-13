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

function fetchFromDatabase($table) {
    global $pdo;
    $sql = ("SELECT * FROM $table");
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function dateConversion($date) {
    $month = strtoupper(date("M", strtotime($date)));
    $day = date("m", strtotime($date));

    return "$month $day";
}

function timeConversion($time) {
    $digitalTime = date("g:ia", strtotime($time));

    return $digitalTime;
}