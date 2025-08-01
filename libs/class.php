<?php
class UploadNugget{
    public function __construct($image, $title){
        global $pdo, $message;
        
        // Check if image has been previously uploaded
        $sql = "SELECT image FROM nuggets WHERE image = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$image]);
        $nuggets = $stmt->fetch();

        
        if(empty($nuggets)) {
            $sql = "INSERT INTO nuggets (image, title) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$image, $title]);
        } else {
            $message = '<p style="color:red">Image has been previously uploaded</p>';
        }
    }
}

class UploadEvent {
    public $event;
    public $date;
    public $venue;
    public $time;
    public function __construct()
    {
        $setEvent = setEvents();
        $this->event = $setEvent->event;
        $this->date = $setEvent->date;
        $this->venue = $setEvent->venue;
        $this->time = $setEvent->time;
    }
}





