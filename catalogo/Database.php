<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'itarondog';

    // Conectamos a la base de datos
    public function connect()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        return $conn;
    }
}
