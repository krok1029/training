<?php
require __DIR__ . '/parts/__connect_db.php';

$rows = $pdo->query("SELECT * FROM `categories`")->fetchAll();

echo json_encode($rows, JSON_UNESCAPED_UNICODE);
