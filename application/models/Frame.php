<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 24/02/2015
 * Time: 16:12
 */

class Frame
{
    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    /**
     * Method to create the intial frame values when a game is created.
     * @param $players
     */
    public function createFrames($players)
    {
        $sql = "INSERT INTO frame(player_name, frame_number)
              VALUES(:playerName, :frameNumber);";

        $query = $this->db->prepare($sql);
        foreach ($players as $player) {
            for ($count = 1; $count <= 10; $count++) {
                $query->bindParam(':playerName', $player);
                $query->bindParam(':frameNumber', $count);
                $query->execute();
            }
        }
    }


    /**
     * Method to return all fields within the Frame table.
     * @return array|bool
     */
    public function getAll()
    {
        $sql = "SELECT *
                FROM frame;";

        $query = $this->db->query($sql);
        $result = $query->fetchALL(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        return false;
    }

    /**
     * Method which returns player scores
     * @param $playerName
     * @return array|bool
     */
    public function getScoreByPlayer($playerName)
    {
        $sql = "SELECT player_name, score
                FROM frame
                WHERE player_name = :playerName";

        $query = $this->db->prepare($sql);
        $query->bindParam(':playerName', $playerName);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        return false;
    }

    public function insertStandardSegment($playerName, $frame, $firstSegment, $secondSegment)
    {
        $sql = "UPDATE frame
                SET first_segment = :firstSegment, second_segment = :secondSegment
                WHERE player_name = :playerName
                AND frame_number = :frameNumber;";

        $query = $this->db->prepare($sql);
        $query->bindParam(':firstSegment', $firstSegment);
        $query->bindParam(':secondSegment', $secondSegment);
        $query->bindParam(':playerName', $playerName);
        $query->bindParam(':frameNumber', $frame);
        $query->execute();
    }

    public function insertFinalSegment($playerName, $frame, $firstSegment, $secondSegment, $thirdSegment)
    {
        $sql = "UPDATE frame
                SET first_segment = :firstSegment, second_segment = :secondSegment, third_segment = :thirdSegment
                WHERE player_name = :playerName
                AND frame_number = :frameNumber;";

        $query = $this->db->prepare($sql);
        $query->bindParam(':firstSegment', $firstSegment);
        $query->bindParam(':secondSegment', $secondSegment);
        $query->bindParam(':thirdSegment', $thirdSegment);
        $query->bindParam(':playerName', $playerName);
        $query->bindParam(':frameNumber', $frame);
        $query->execute();
    }


    public function getFramesByPlayer($playerName)
    {
        $sql = "SELECT *
                FROM frame
                WHERE player_name = :playerName;";

        $query = $this->db->prepare($sql);
        $query->bindParam(':playerName', $playerName);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($result) > 0) {
            return $result;
        }

        return false;
    }


    /*
     * Purge the Frame table of all records.
     */
    public function purgeTable()
    {
        $sql = "DELETE
                FROM Frame;";

        $query = $this->db->query($sql);
    }
}