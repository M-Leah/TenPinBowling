<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 23/02/2015
 * Time: 17:01
 */

class Validate
{
    /**
     * Method which takes in an array of data, and then validates the non-null values and returns them
     * Method Returns false if: PostData is Empty, PostData is Blank, Names are not Unique.
     * @param array $postData
     * @return array|bool
     */
    public function players(Array $postData)
    {
        $playerArray = [];

        /*
         * Check the post data is not empty prior to manipulation
         */
        if (!empty($postData)) {

            /*
             * Check a blank form was not submitted.
             */
            if ($this->namesExist($postData) === true) {

                /*
                 * Check player names are unique prior to manipulation
                 */
                if ($this->uniqueNames($postData) === true) {

                    foreach ($postData as $data) {

                        /*
                         * If the data is not null then proceed to sanitise in preparation to be returned
                         */
                        if ($data != null) {

                            $playerArray[] = filter_var(htmlentities($data), FILTER_SANITIZE_STRING);

                        }
                    }

                    return $playerArray;

                }
            }

            return false;

        }

        return false;
    }


    /**
     * Method to work out whether player names are unique within a game.
     * @param array $postData
     * @return bool
     */
    public function uniqueNames(Array $postData)
    {


        /*
         * Compares the Unique values against the default array
         */
        if (count(array_unique(array_filter($postData))) != count(array_filter($postData))) {

            /*
             * A player name has been used more than once.
             */
            return false;

        }

        /*
         * All player names are unique
         */
        return true;
    }


    /**
     * Method to determine whether player names exist.
     * @param array $postData
     * @return bool
     */
    public function namesExist(Array $postData)
    {
        /*
         * Unset the first key which will be the select box option.
         */
        unset($postData[0]);

        /*
         * Initialise flag to false prior to looping through the post data.
         * If the post data is not null set the flag to true.
         */
        $flag = false;
        foreach ($postData as $data) {

            if ($data != null || '') {

                $flag = true;

            }

        }

        /*
         * Return the flag to determine whether player names exist or not.
         *  TRUE - Names Exist
         *  FALSE - Names do not exist
         */
        return $flag;

    }


    /**
     * Method to validate whether pin scores are valid or not.
     * @param $firstSegment
     * @param $secondSegment
     * @return bool
     */
    public function pins($firstSegment, $secondSegment)
    {
        $totalPins = $firstSegment + $secondSegment;
        if ($totalPins <= 10) {
            // Pins do not exceed the maximum amount.
            return true;
        }

        // Pins exceed the maximum score
        return false;
    }

    public function finalPins($firstSegment, $secondSegment)
    {
        // Not a Strike
        if ($firstSegment < 10) {
            // Not a Spare
            if (($firstSegment + $secondSegment) != 10) {

                if (($firstSegment + $secondSegment) < 10) {
                    return true;
                }

            }
            // Spare
            elseif (($firstSegment + $secondSegment) == 10) {
                return true;
            }
        }

        // Is a strike
        return true;

    }
}