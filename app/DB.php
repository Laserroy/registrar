<?php

namespace App;

use Dotenv\Dotenv;
use PDO;
use Platformsh\ConfigReader\Config;

class DB
{
    public $connection;
    
    public function __construct()
    {
        $config = new Config();
        
        if ($config->isValidPlatform()) {
            $credentials = $config->credentials('database');
            $this->connection = new PDO($config->formattedCredentials('database', 'pdo_mysql'), $credentials['username'], $credentials['password'], [
                PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => TRUE,
                PDO::MYSQL_ATTR_FOUND_ROWS => TRUE,
            ]);
        } else {
            if (file_exists(__DIR__ . '/../.env')) {
                $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/..');
                $dotenv->load();
            }
    
            $host = getenv('DB_HOST');
            $port = getenv('DB_PORT');
            $database = getenv('DB_DATABASE');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');
    
            $dsn = "mysql:host=$host;port=$port;dbname=$database";
            try {
                $connection = new PDO($dsn, $username, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $this->connection = $connection;
        }
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}
