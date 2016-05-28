<?php
/**
 * Created by PhpStorm.
 * User: Mitra
 * Date: 21/05/2016
 * Time: 16:50
 */

use config\Psr4AutoloaderClass;
use \Model\Entity\User;
use \Model\Entity\Proposal;
use \Model\Dao\UserMapper;
use \Model\Dao\UserMapperPdo;
use \Model\Dao\ProposalMapper;
use \Model\Dao\ProposalMapperPdo;

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

require 'config/Psr4AutoloaderClass.php';

$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('config', './config');
$loader->addNamespace('Model\Entity', './Model/Entity');
$loader->addNamespace('Model\Dao', './Model/Dao');

$user = new User();
$propsal = new Proposal();

if (isset($_GET['p'])){
    $p = $_GET['p'];
} else {
    $p = 'home';
}

ob_start();
if ($p === 'home') {
    require 'views/home.php';
} elseif ($p === 'single') {
    require 'views/single.php';
}

$content = ob_get_clean();

require 'views/templates/default.php';
