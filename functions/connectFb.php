<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
require '../constants.php';
use \App\Facebook\FacebookConnect;
require ROOT.'/vendor/autoload.php';
require ROOT.'/model/UserModel.php';

$connect = new FacebookConnect(APP_ID, APP_SECRET);
$user = $connect->connect(REDIRECT_URL);

echo $user;