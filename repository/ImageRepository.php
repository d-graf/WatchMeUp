<?php
require_once '../lib/Repository.php';

class ImageRepository extends Repository
{
    protected $tableName = 'image';
    public function upload($titel, $image)
    {
        $query = "INSERT INTO $this->tableName (title, image) VALUES (?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $titel, $image);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }
}