<?php
/**
 * Created by PhpStorm.
 * User: newwer21
 * Date: 19/06/15
 * Time: 12:07
 */

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ENV','prod');
/* HEROKU */

if(ENV=="prod"){
    define('HOST', 'ec2-54-225-154-5.compute-1.amazonaws.com');
    define('USER_DB', 'xbhzyyoziowdlx');
    define('PWD_DB', 'ICVHJx9jSI-oRmpxvsT6VM3c-l');
    define('DB_NAME', 'dagidi42jnneae');
}else{
    define('HOST', 'localhost');
    define('USER_DB', 'root');
    define('PWD_DB', 'root');
    define('DB_NAME', 'project-fb');
}