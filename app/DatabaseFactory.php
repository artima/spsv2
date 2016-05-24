<?php
/**
 * Created by PhpStorm.
 * User: Mitra
 * Date: 22/05/2016
 * Time: 12:14
 */

namespace App;


class DatabaseFactory
{
    private $db_name;
    private $sgbd;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $sgbd = "mysql", $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->sgbd = $sgbd;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        try {
            $pdo = new \PDO($this->sgbd.':dbname='.$this->db_name.';host='.$this->db_host, $this->db_user, $this->db_pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(\PDOException $Exception) {
            echo $Exception->getMessage();
            echo (int)$Exception->getCode();
        }
    }

    public function query()
    {
        $pdo = $this->getPDO();
        $pdo->exec('INSERT  INTO user SET name="Nom", date="' . date('Y-m-d H:i:s') . '"');
    }

}