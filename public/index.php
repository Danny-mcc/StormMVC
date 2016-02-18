<?php
session_start();

require_once(__DIR__ . '/../vendor/core/Constants.php');
require_once(__DIR__ . '/../vendor/core/App.php');
require_once(__DIR__ . '/../vendor/core/Controller.php');
require_once(__DIR__ . '/../vendor/core/View.php');
//require_once(__DIR__ . '/../vendor/core/Model.php');
require_once(__DIR__ . '/../vendor/core/Helpers.php');

//define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/../vendor/facebook-php-sdk-v4-5.0.0/src/Facebook/');
require_once(__DIR__ . '/../vendor/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php');


$app = new App();