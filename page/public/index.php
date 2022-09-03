<?php
require(__DIR__ . '/../vendor/autoload.php');
use Pecee\SimpleRouter\SimpleRouter as Router;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->safeLoad();
require(__DIR__ . '/../routes/routes.php');

Router::start();