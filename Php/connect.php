<?php
class DBConfig
{
    private $connection;

    private $host = "localhost";
    private $username = "root";
    private $dbName = "projekti_webinxh";
    private $password = "";

    private function createConnection()
    {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connecting...";
    }
    public function getConnection()
    {
        $this->createConnection();
        // echo "<br> Connected to Database <br>";
        return $this->connection;
    }
}

