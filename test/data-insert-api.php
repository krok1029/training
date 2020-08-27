<?php
require __DIR__ . '/0825-parts/__connectDb.php';

//TODO 檢查資料格式
$sql = "INSERT INTO `addressTable`( `name`, `address`, `e-mail`, `phone`, `birthday`, `createDt`)
VALUES(?,?,?,?,?,NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['address'],
    $_POST['e-mail'],
    $_POST['phone'],
    $_POST['birthday']
]);







echo 'OK';
