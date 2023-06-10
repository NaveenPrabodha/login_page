<?php

class DatabaseHelper
{
    private $dbHost;
    private $dsn;
    private $username;
    private $password;
    private $db;

    public function __construct()
    {
        $this->dbHost = $_SERVER['SERVER_NAME'];
        $this->dsn = "mysql:host=" . $this->dbHost . ";dbname=mystore";
        $this->username = "root";
        $this->password = "naveen1N@";
    }

    // public function __construct()
    // {
    //     $this->dbHost = "sql110.epizy.com";
    //     $this->dsn = "mysql:host=" . $this->dbHost . ";dbname=epiz_33294388_nsbm_events";
    //     $this->username = "epiz_33294388";
    //     $this->password = "JQdiYtDh6MRZ8hS";
    // }

    public function getDB()
    {
        return $this->db;
    }

    public function connect()
    {
        try {
            $this->db = new PDO($this->dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new $e;
        }
    }

    public function query($sql, $parameters = [])
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($parameters);
            return $stmt;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function close()
    {
        $this->db = null;
    }
}