<?php

class serviceBDD
{
    private $statement;

    public function __construct($host, $port, $namebdd, $username, $pwd)
    {
        $this->statement = new PDO(
            "mysql:host={$host};port:{$port};dbname={$namebdd}",
            $username,
            $pwd,
            array(PDO::ATTR_PERSISTENT=>false,PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8')
        );
    }

    /**
     * @return PDO
     */
    public function getStatement(): PDO
    {
        return $this->statement;
    }

}