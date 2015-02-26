<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 23/02/2015
 * Time: 10:33
 */

class Home extends BaseController
{
    private $error = '';

    public function index()
    {
        // Purge previous records prior to starting a new game.
        $this->model('Player')->purgeTable();
        $this->model('Frame')->purgeTable();

        $validate = new Validate();

        // Sanitise the input for the player names.
        $players = $validate->players($_POST);
        if ($players !== false) {

            /*
             * Insert Valid names into the Database
             * Create the initial base frame table
             * Redirect the user to the game screen
             */
            $this->model('Player')->insert($players);
            $this->model('Frame')->createFrames($players);
            header('Location: /TenPinBowling/game/index');
            die();


        }

        // Slight issue that was not fixed: Sometimes displays the error when no input is selected.
        $error = 'There was an issue with the names you submitted, please ensure player names are unique.';



        $this->view('home/index', [
            'error' => $error
        ]);

    }


}