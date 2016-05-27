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
$pdo->dbConnection();
/*$value = array(
    'name' => 'Mitra',
    'email' => 'mitraUpdate@gmail.com'
);*/
$userMapper = new UserMapperPdo($pdo);
$user = $userMapper->getUnique(2);
var_dump($user);
echo '<div style="margin-top: 50px;"></div>';

$propal = new Proposal();

$propalmapper = new ProposalMapperPdo($pdo);
$propal->setUser($user);
$propalmapper->add($propal);
var_dump($propalmapper->getList());


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
