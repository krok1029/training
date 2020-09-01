<?php
require __DIR__ . '/0825-parts/__connectDb.php';


$stmt = $pdo->query("SELECT * FROM addressTable LIMIT 5 ");

echo json_encode($stmt->fetchAll());
//echo json_encode($stmt->fetchAll(PDO::FETCH_NUM)); //索引式
// echo json_encode($stmt->fetchAll(PDO::FETCH_BOTH));//兩個都有
