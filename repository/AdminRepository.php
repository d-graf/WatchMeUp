<?php

require_once '../lib/Repository.php';
/**
 * Created by PhpStorm.
 * User: bhawks
 * Date: 13.03.2017
 * Time: 15:41
 */
class AdminRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableNameUser = 'user';
    protected $tableNameImage = 'image';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function register($username, $email, $password)
    {
        $password = sha1($password);

        $query = "INSERT INTO $this->tableName (username, email, password) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('sss', $username, $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
}