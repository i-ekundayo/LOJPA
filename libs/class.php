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
    private $pdo;
    public $data = [];
    private $errors = [];
    private $fields = ['event', 'startDate', 'endDate', 'venue', 'startTime', 'endTime'];

    public function __construct($pdo) {
        $this->pdo = $pdo;
        if ($this->isSubmitted()){
            $this->sanitize();
            $this->setErrors();
            $this->setFields();
        }
    }

    public function isSubmitted(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['events']);
    }

    private function sanitize() {
        foreach ($this->fields as $field) {
            $this->data[$field] = trim(filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS));
        }
    }

    private function setErrors() {
        foreach($this->fields as $field) {
            if(empty($this->data[$field])) {
                $this->errors[$field] = '<p style="color:red">' . ucfirst($field) . ' is required.</p>';
            }
        }
    }

    public function setFields() {
        if(empty($this->errors)){
            $sql = "INSERT INTO events (event, startDate, endDate, venue, startTime, endTime) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->data['event'], $this->data['startDate'], $this->data['endDate'], $this->data['venue'], $this->data['startTime'], $this->data['endTime']]);

            $message = '<p style="color:green">event successfully uploaded</p>';
            echo $message;
        }
    }

    public function getErrors($field) {
        return $this->errors[$field] ?? null;
    }
}





