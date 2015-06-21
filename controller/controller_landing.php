<?php
use App\Facebook\FacebookConnect;
$connect = new FacebookConnect(APP_ID, APP_SECRET);
$user = $connect->connect(REDIRECT_URL);
