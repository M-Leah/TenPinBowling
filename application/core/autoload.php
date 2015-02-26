<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 23/02/2015
 * Time: 10:29
 */

spl_autoload_register(function($class) {
    require_once '/application/libs/' . $class . '.php';
});