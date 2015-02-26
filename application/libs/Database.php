<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 23/02/2015
 * Time: 11:34
 */

class Database
{
    public $db;

    /**
     * Attempts to Establish a connection to the database.
     * @return PDO
     */
    public function connect()
    {
        try {

            return $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';' . 'dbname=' . DB_NAME . ';charset='. DB_CHARSET, DB_USER, DB_PASS);

        } catch (PDOException $e) {

            exit('Unable to establish a Database connection at this time.');

        }


    }
}