<?php
/**
 * Created by PhpStorm.
 * User: newwer21
 * Date: 19/06/15
 * Time: 12:07
 */
define('ENV','dev');
if(ENV=='prod'){
    define('ROOT', $_SERVER['DOCUMENT_ROOT']);
    define('DRIVER', 'pgsql');
    define('HOST', 'ec2-54-225-154-5.compute-1.amazonaws.com');
    define('USER_DB', 'xbhzyyoziowdlx');
    define('PWD_DB', 'ICVHJx9jSI-oRmpxvsT6VM3c-l');
    define('DB_NAME', 'dagidi42jnneae');

}else{
    define('ROOT', $_SERVER['DOCUMENT_ROOT']."projet-groupe-fb");
    define('DRIVER', 'mysql');
    define('HOST', 'localhost');
    define('USER_DB', 'root');
    define('PWD_DB', 'root');
    define('DB_NAME', 'projetfb');
}

define('APP_ID','384491318402733');
define('APP_SECRET','dab4c606e28695176a9d99dcc2a813c8');
define('REDIRECT_URL','https://localhost/projet-groupe-fb/');
