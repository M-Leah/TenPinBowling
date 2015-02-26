<?php
/**
 * Created by PhpStorm.
 * User: Mikey
 * Date: 23/02/2015
 * Time: 13:10
 */

/*
 * Configuration for Error Reporting.
 * Error Reporting set to Development Environment settings, these should not be used in a live environment.
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);


/*
 * Configuration for Database Constants
 */
define("DB_TYPE", 'mysql');
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "tenpin");
define("DB_USER", "root");
define("DB_PASS", "");
define('DB_CHARSET', 'utf8');