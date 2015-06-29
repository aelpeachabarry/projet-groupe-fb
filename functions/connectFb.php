<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
use \App\Facebook\FacebookConnect;
require '../vendor/autoload.php';
require '../app/Facebook/constants.php';
require '../model/UserModel.php';

$connect = new FacebookConnect(APP_ID, APP_SECRET);
$user = $connect->connect(REDIRECT_URL);