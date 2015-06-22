<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
use \App\Facebook\FacebookConnect;
require '../vendor/autoload.php';
require '../app/Facebook/constants.php';

$connect = new FacebookConnect(APP_ID, APP_SECRET);
$user = $connect->connect(REDIRECT_URL);

if(is_string($user)){
    echo $user;
}else{
    $_SESSION['user'] = $user;
    $_SESSION['fbsession'] = $connect;
}