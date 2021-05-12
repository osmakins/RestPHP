<?php
require 'vendor/autoload.php';

use DevCoder\DotEnv;
use Src\System\DatabaseConnector;

$dotenv = new DotEnv(__DIR__."/.env");
$dotenv->load();

$dbConnection = (new DatabaseConnector())->getConnection();


