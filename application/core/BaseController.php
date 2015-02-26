<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 23/02/2015
 * Time: 10:27
 */

class BaseController
{
    /**
     * Method to allow Controllers to load in Models.
     * @param $model
     * @return mixed
     */
    protected function model($model)
    {
        if (file_exists('application/models/' . $model . '.php')) {
            require_once 'application/models/' . $model . '.php';
        }

        $db = new Database();
        return new $model($db->connect());
    }


    /**
     * Mehthod to allow Controllers to load in Views.
     * Returns a 404 Error if the View is not found.
     * @param $view
     * @param array $data
     * @return mixed
     */
    protected function view($view, $data = [])
    {
       if (file_exists('application/views/' . $view . '.php')) {
           return require_once 'application/views/' . $view . '.php';
       }

       return require_once 'application/views/errors/404.php';

    }

}