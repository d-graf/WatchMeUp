<?php
require_once '../lib/Repository.php';

/**
 * Das ImageRepository ist zuständig für alle Zugriffe auf die Tabelle "image".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class PostGalleryRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'gallery';
    /**
     * Zeigt alle Gallerien an
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function show()
    {
        $query = "SELECT `id`, `title` FROM $this->tableName";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}