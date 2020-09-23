<?php

namespace App;

use Dotenv\Dotenv;
use PDO;

class DbConnection
{
    public static function make()
    {
        $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/..');
        $dotenv->load();

        $type = getenv('DB_CONNECTION');
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $database = getenv('DB_DATABASE');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        $dsn = "$type:host=$host;port=$port;dbname=$database";
        try {
            $connection = new PDO($dsn, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $connection;
    }
}
