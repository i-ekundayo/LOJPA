<?php
class UploadNugget{
    public function __construct($image){
        global $pdo, $message;
        // Check if image has been previously uploaded
        $sql = "SELECT * FROM nuggets WHERE image = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$image]);
        $nuggets = $stmt->fetchAll();

        if(empty($nuggets)) {
            $sql = "INSERT INTO nuggets (image) VALUES (?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$image]);
        } else {
            $message = '<p style="color:red">Image has been previously uploaded</p>';
        }
    }
}

class GetNuggets{
    public function __construct(){
        global $pdo;
        $sql = ("SELECT * FROM nuggets");
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $nuggets = $stmt->fetchAll();

        foreach($nuggets as $nugget) {
            echo $nugget->image . '<br>';
        }
    }
}