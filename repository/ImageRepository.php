<?php
require_once '../lib/Repository.php';

class ImageRepository extends Repository
{
    protected $tableName = 'image';

    public function upload($titel, $image, $image_path, $userid)
    {
        $query = "INSERT INTO $this->tableName (title, image, user_id) VALUES (?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $imageFileType = pathinfo($image,PATHINFO_EXTENSION);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }

        $null = NULL;
        $statement->bind_param('sbi', $titel, $null, $userid);
        $statement->send_long_data(1, file_get_contents($image_path));

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }
}