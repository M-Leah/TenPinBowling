<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 24/02/2015
 * Time: 15:24
 */

class Player
{
    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    /**
     * Method to get all players from the database.
     * Method will return false if no players exist.
     * @return array|bool
     */
    public function get()
    {
        $sql = "SELECT *
                FROM player;";

        $query = $this->db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        /*
         * No records were found.
         */
        return false;
    }


    /**
     * Method to insert players into the database
     * @param $playersArray
     */
    public function insert($playersArray)
    {

        $sql = "INSERT INTO player (player_name)
                VALUES (:playerName);";

        $query = $this->db->prepare($sql);

        foreach ($playersArray as $player) {
            $query->bindParam(':playerName', $player);
            $query->execute();
        }
    }


    /**
     * Method to update a player name.
     * @param $currentName
     * @param $newName
     */
    public function editName($currentName, $newName)
    {
        $sql = "UPDATE player
                SET player_name = :newName
                WHERE player_name = :currentName;";

        $query = $this->db->prepare($sql);
        $query->bindParam(':currentName', $currentName);
        $query->bindParam(':newName', $newName);
        $query->execute();

        $sql = "UPDATE frame
                SET player_name = :newName
                WHERE player_name = :currentName;";

        $query = $this->db->prepare($sql);
        $query->bindParam(':currentName', $currentName);
        $query->bindParam(':newName', $newName);
        $query->execute();

    }


    /**
     * Purges the Player Table of all records
     */
    public function purgeTable()
    {
        $sql = "DELETE
                FROM player;";

        $query = $this->db->query($sql);
    }
}