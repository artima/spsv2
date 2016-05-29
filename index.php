<?php
/**
 * Created by PhpStorm.
 * User: Mitra
 * Date: 21/05/2016
 * Time: 16:50
 */

use Model\Entity\User;

require_once "app/start.php";

$user = new User();
$user->getEmail();
