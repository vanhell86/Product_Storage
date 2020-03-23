<?php

namespace Core;

use Medoo\Medoo;

class Database
{
    public static $instance;
    private $connection;

    public function __construct(
        string $dbname,
        string $host,
        string $username,
        string $password
    )
    {
        $this->connection = new Medoo([
            'database_type' => 'mysql',
            'database_name' => $dbname,
            'server' => $host,
            'username' => $username,
            'password' => $password
        ]);

        $this->connection()->query("CREATE TABLE IF NOT EXISTS `products` (
            `id` int(11) AUTO_INCREMENT,
            `sku` varchar(255) NOT NULL UNIQUE,
            `name` varchar(255) NOT NULL,
            `type` varchar(50) NOT NULL,
            `price` int(11) NOT NULL,
            `size` int(11) NULL,
            `weight` int(11) NULL,
            `height` int(11) NULL,
            `width` int(11) NULL,
            `length` int(11) NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,      
            PRIMARY KEY (`id`)
            )");
        self::$instance = $this;
    }

    public function connection()
    {
        return $this->connection;
    }
}