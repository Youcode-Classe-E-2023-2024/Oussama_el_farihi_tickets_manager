<?php

require_once '../config.php';

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->connection->connect_error) {
            die("connection error: " . $this->connection->connect_error);
        }
    }

    public function escape($value)
    {
        return $this->connection->real_escape_string($value);
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function fetch($sql)
    {
        $result = $this->connection->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function fetchAll($sql) {
        $result = $this->connection->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function getLastInsertId() {
        return $this->connection->insert_id;
    }
    
}




?>