<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 23/02/2015
 * Time: 10:24
 */



class Application
{
    /*
     * Initialise default values prior to URL splitting.
     */
    protected $controller = 'home';
    protected $method = 'index';
    protected $parameters = [];


    /**
     * Constructs the Application when called.
     * Handles all Routing and loads in URL Segments.
     */
    public function __construct()
    {
        $url = $this->parseURL();


        /*
         * Controller Preparation
         */
        if(file_exists('application/controllers/' . $url[0] . '.php')) {

            $this->controller = $url[0];
            unset($url[0]);

        }

        /*
         * Load in the Controller and create a new Instance of the Controller Object.
         */
        require_once 'application/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        /*
         * Method Preparation
         */
        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                unset($url[1]);

            }

        }

        /*
         * Parameter Preparation.
         */
        $this->params = $url ? array_values($url) : [];

        /*
         * Load in the Controller, Method and Parameters for use.
         */
        call_user_func_array([$this->controller, $this->method], $this->params);

    }


    /**
     * Method to Sanitize and parse the URL.
     * @return array
     */
    public function parseURL()
    {
        if (isset($_GET['url'])) {

            /*
             * Sanitise and Parse the URL into the various parameters.
             */
            $url = rtrim(filter_var($_GET['url'], FILTER_SANITIZE_URL));
            $parsedUrl = parse_url($url);
            $path = explode('/', $parsedUrl['path']);

            /*
             * Return the Parsed URL
             */
            return $path;


        }

    }

}