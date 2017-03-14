<?php
require_once '../lib/Repository.php';

class ImageRepository extends Repository
{
    protected $tableName = 'image';

    public function upload($titel, $image, $image_path)
    {
        $query = "INSERT INTO $this->tableName (title, image) VALUES (?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $imageFileType = pathinfo($image,PATHINFO_EXTENSION);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }

        $null = NULL;
        $statement->bind_param('sb', $titel, $null);
        $statement->send_long_data(1, file_get_contents($image_path));

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }

    public function editTitleById($newTitle, $id ) {

        $query = "UPDATE {$this->tableName} SET title = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si', $newTitle, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}