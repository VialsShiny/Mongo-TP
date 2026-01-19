<?php
namespace App\Config;

use MongoDB\Client;

class Database
{
    private $db;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];

        $uri = "mongodb://$host";

        $client = new Client($uri);
        $this->db = $client->selectDatabase($dbname);
    }

    public function getDb()
    {
        return $this->db;
    }
}
