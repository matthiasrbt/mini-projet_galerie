<?php

require_once 'files_to_include.php';

use Controllers\GaleryController;

$config = Configuration\Config::get();

$_SESSION['Index_path'] = explode('/', trim($_SERVER['SCRIPT_NAME'],'/'));
$_SESSION['Index_path_length'] = count($_SESSION['Index_path']);

new Util\Route($config);
