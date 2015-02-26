<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 26/02/2015
 * Time: 13:02
 */

class FrameCalculator
{

    /**
     * Method to calculate the score awarded for a players frames
     * @param $playerFrames
     */
    public function calcScore($playerFrames)
    {

        //print_r($playerFrames);

        $segments = $this->convertToWords($playerFrames);
        $playersArray = array_chunk($segments, 12);


        //print_r($playersArray);
        $scoresArray = $this->calcStrike($playersArray);

        return $scoresArray;

    }

    public function cascadingScores($scoresArray)
    {

        $position = 0;
        foreach($scoresArray as $player) {

            $length = count($player);
            $frames = 1;
            for($count = 0; $count < $length; $count++) {
                if ($frames != 1) {

                    // Unsolved Issue in Solution -- Calculates Scores if not set.
                    $scoresArray[$position][$count] += $scoresArray[$position][$count - 1];

                }

                $frames++;
            }

            $position++;
        }

        return $scoresArray;
    }

    /**
     * Method to loop through player frames and convert them into relevant scores (Strike/Spare)
     * @param $playerFrames
     * @return array
     */
    public function convertToWords($playerFrames)
    {
        // Loop for each player

        foreach($playerFrames as $player) {

            $frame = 1;

            foreach($player as $detail) {
                if ($frame != 10) {

                    if ($this->isStrike($detail['first_segment']) === true) {
                        $segments[] = 'Strike';
                    } elseif ($this->isSpare($detail['first_segment'], $detail['second_segment']) === true) {
                        $segments[] = 'Spare';
                    } else {
                        $segments[] = $detail['first_segment'] + $detail['second_segment'];
                    }

                }
                else {

                    $first = $detail['first_segment'];
                    $second = $detail['second_segment'];
                    $third = $detail['third_segment'];

                    if ($first == 10) {
                        $segments[] = 'Strike';
                    } else {
                        $segments[] = $detail['first_segment'];
                    }


                    if (($first + $second) == 10) {
                        $segments[] = 'Spare';
                    } elseif ($second == 10) {
                        $segments[] = 'Strike';
                    }
                    else {
                        $segments[] = $second;
                    }


                    $segments[] = $detail['third_segment'];


                }


                $frame++;
            }

        }

        return $segments;
    }



    public function isStrike($firstSegment)
    {
        if ($firstSegment == 10) {
            // Segment is a strike.
            return true;
        }

        return false;
    }

    public function isSpare($firstSegment, $secondSegment)
    {
        $score = $firstSegment + $secondSegment;
        if ($firstSegment != 10 && $score == 10) {
            return true;
        }

        return false;
    }

    public function isFinalSpare($firstSegment, $secondSegment)
    {
        $score = $secondSegment;
        if ($firstSegment != 10 && $score == 10) {
            return true;
        }

        return false;
    }



    public function calcStrike($playerScores)
    {
        // Loop for each player
        $position = 0;
        foreach($playerScores as $player) {

            $length = count($player);
            $frames = 1;
            for($count = 0; $count < $length; $count++) {

                if ($frames == 10) {
                    // Final Frames Logic

                    // Work out whether, 0, 1 or 2 Balls awarded.
                    $balls = $this->ballsAwarded($playerScores[$position][$count], $playerScores[$position][$count + 1]);

                    switch($balls) {
                        case 1:
                            $playerScores[$position][$count] = 10 +  ($this->convertFromWords($playerScores[$position][$count + 1]));
                            break;
                        case 2:
                            $playerScores[$position][$count] = 10 +  ($this->convertFromWords($playerScores[$position][$count + 1]) + $this->convertFromWords($playerScores[$position][$count + 2]));
                            break;
                        default:
                            break;

                    }
                }
                elseif ($frames < 10) {
                    // Standard Frame Logic

                    if ($player[$count] === 'Strike') {
                        $playerScores[$position][$count] = 10 +  ($this->convertFromWords($playerScores[$position][$count + 1]) + $this->convertFromWords($playerScores[$position][$count + 2]));
                    }
                    elseif ($player[$count] === 'Spare') {
                        $playerScores[$position][$count] = 10 +  ($this->convertFromWords($playerScores[$position][$count + 1]));
                    }

                }
                else {
                    // Stop extra segments causing an error
                    unset($playerScores[$position][$count]);
                }



                $frames++;
            }


            $position++;

        }

        return $playerScores;
    }

    /**
     * Method to work out the amount of balls awarded for the final frame
     * @param $firstSegment
     * @param $secondSegment
     * @return int
     */
    public function ballsAwarded($firstSegment, $secondSegment)
    {
        if ($firstSegment == 'Strike') {
            return 2;
        }

        elseif ($secondSegment == 'Spare') {
            return 1;
        }

        else {
            return 0;
        }



    }




    public function convertFromWords($score)
    {
        if ($score === 'Strike' || $score === 'Spare') {
            return 10;
        }

        return $score;
    }
}