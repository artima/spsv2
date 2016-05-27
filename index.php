<?php
/**
 * Created by PhpStorm.
 * User: Mitra
 * Date: 21/05/2016
 * Time: 16:50
 */

use Model\Entity\User;

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}
echo ini_get('display_errors');

require 'config/Psr4AutoloaderClass.php';

$autoloader = new config\Psr4AutoloaderClass();
$autoloader->register();

$user = new User();
var_dump($user->isNew());die;

if (isset($_GET['p'])){
    $p = $_GET['p'];
} else {
    $p = 'home';
}

ob_start();
if ($p === 'home') {
    require '../views/home.php';
} elseif ($p === 'single') {
    require '../views/single.php';
}

$content = ob_get_clean();

require '../views/templates/default.php';
