<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 23/02/2015
 * Time: 17:26
 */

class Game extends BaseController
{
    // Landing page for this Controller
    public function index()
    {
        $players = $this->model('Player')->get();

        $frameCalc = new FrameCalculator();

        // Loop through each player and store their specific frames into an array
        foreach($players as $player) {
            $frames[] = $this->model('Frame')->getFramesByPlayer($player['player_name']);
        }

        // Calculate the scores
        $frameScores = $frameCalc->calcScore($frames);
        $cascadingScores = $frameCalc->cascadingScores($frameScores);

        $this->view('game/index', [
            'players' => $players,
            'frameScores' => $frameScores,
            'cascadingScores' => $cascadingScores
        ]);
    }

    /**
     * Allows a player to edit their in-game name.
     * @param string $name
     */
    public function editName($name = '')
    {
        // If the form is submitted change the users name and redirect them back to the game screen.
        if (isset($_POST['new_name']) && !empty($_POST['new_name'])) {
            $this->model('Player')->editName($name, htmlentities($_POST['new_name']));
            header('Location: /TenPinBowling/Game/Index');
        }

        $this->view('game/editName', []);

    }

    public function editFrame($playerName = '', $frameNumber = '')
    {
        $validate = new Validate();

        if ($frameNumber != 10) {

            if (isset($_POST) && !empty($_POST)) {

                // Validate Pins knocked down are not greater than the total of 10
                if ($validate->pins($_POST['first_segment'], $_POST['second_segment'])) {
                    $firstSegment = htmlentities($_POST['first_segment']);
                    $secondSegment = htmlentities($_POST['second_segment']);

                    // Insert Values into Frame.
                    $this->model('Frame')->insertStandardSegment($playerName, $frameNumber, $firstSegment, $secondSegment);
                    header('Location: /TenPinBowling/Game/index');
                }

            }



            $this->view('game/editStandardFrame', []);
        } else {

            if (isset($_POST) && !empty($_POST)) {
                // Validate Pins knocked down are not greater than the total of 10
                if ($validate->finalPins($_POST['first_segment'], $_POST['second_segment'])) {

                    $firstSegment = htmlentities($_POST['first_segment']);
                    $secondSegment = htmlentities($_POST['second_segment']);
                    $thirdSegment = htmlentities($_POST['third_segment']);

                    // Insert the Final frame scores into the database
                    $this->model('Frame')->insertFinalSegment($playerName, 10, $firstSegment, $secondSegment, $thirdSegment);
                    header('Location: /TenPinBowling/Game/index');


                }
            }


            $this->view('game/editFinalFrame', []);
        }

    }
}