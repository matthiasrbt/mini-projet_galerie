﻿<?php // index.php
session_start();
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

require_once 'files_to_include.php';

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

use Util\Route;

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

$_SESSION['Index_path'] = explode('/', trim($_SERVER['SCRIPT_NAME'],'/'));
$_SESSION['Index_path_length'] = count($_SESSION['Index_path']);

// /*Code test*/
// echo '<pre>';
// print_r($_SESSION['Index_path']);
// echo '</pre><br><br>';
// echo 'Longueur du tableau :'.$_SESSION['Index_path_length'].'<br><br>';

$routeur = new Route;

?>
