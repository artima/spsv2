<?php
/**
 * Created by PhpStorm.
 * User: Mitra
 * Date: 21/05/2016
 * Time: 16:50
 */

namespace App;


if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}
echo ini_get('display_errors');

require '../app/Autoloader.php';

Autoloader::register();

$pdo = new DatabaseFactory('spsv2');

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
