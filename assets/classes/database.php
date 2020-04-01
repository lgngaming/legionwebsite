<?php

 
class MyPDO extends PDO
{
    public function __construct($dsn, $options = [])
    {   
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];
    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
        $default_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $options = array_replace($default_options, $options);
        parent::__construct($dsn, $username, $password, $options);
    }
    public function run($sql, $args = NULL)
    {
        if (!$args)
        {
             return $this->query($sql);
        }
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
?>