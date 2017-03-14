<?php
require_once '../lib/Repository.php';

/**
 * Das ImageRepository ist zuständig für alle Zugriffe auf die Tabelle "image".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class ImageRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'image';
    /**
     * Uploadet Bild mit dazugehörigem Namen
     *
     * @param $titel Wert für die Spalte titel
     * @param $image_path Wert für die Spalte image
     * @param $catId Wert für die Spalte cat_id
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function upload($titel, $image_path, $catId)
    {
        $query = "INSERT INTO $this->tableName (title, image, cat_id) VALUES (?, ?, (SELECT id FROM `gallery` WHERE id = ?))";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $null = NULL;
        $statement->bind_param('sbi', $titel, $null, $catId);
        $statement->send_long_data(1, file_get_contents($image_path));

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }
    /**
     *
     * Updatet den Titel des Posts
     *
     * @param $newTitle Wert für die Spalte title
     * @param $id Wert für die Spalte id
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function editTitleById($newTitle, $id ) {

        $query = "UPDATE {$this->tableName} SET title = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si', $newTitle, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}