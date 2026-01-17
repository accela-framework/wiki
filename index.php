<?php

require_once __DIR__ . "/vendor/autoload.php";

use Accela\Env;
Env::load(__DIR__ . "/env.php");

$accela = require_once __DIR__ . "/app/init-accela.php";
$accela->route(isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/");
