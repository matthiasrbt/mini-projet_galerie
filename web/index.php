<?php

require_once 'files_to_include.php';

use Controllers\GaleryController;

$config = Configuration\Config::get();
new Util\Route($config);
