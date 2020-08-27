<?php

$db_host = 'localhost';
$db_name = 'mytest';
$db_user = 'Gandalf';
$db_pass = '123456';
$db_port = '3307';

$dsn = "mysql:host={$db_host};dbname={$db_name};port={$db_port}";
$pdo_option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_option);


define('WEB_ROOT', '/training');
