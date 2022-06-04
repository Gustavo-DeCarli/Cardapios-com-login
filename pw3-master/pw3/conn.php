<?php
    define('USER', 'aluno');
    define('PASSWORD', 'aluno');
    define('HOST', 'localhost');
    define('DATABASE', 'db');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>