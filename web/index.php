<?php

require_once '../app/Controllers/GaleryController.php';
require_once '../util/View.php';
require_once "../util/Route.php";
require_once "../config/Config.php";

use Controllers\GaleryController;

$config = Configuration\Config::get();
new Util\Route($config);
