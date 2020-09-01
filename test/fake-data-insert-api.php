<?php
require __DIR__ . '/0825-parts/__connectDb.php';

//TODO 檢查資料格式
$names = ['a', 's', 'l', 'f'];
for ($i = 1; $i < 10; $i++) {
    shuffle($names);
    $sql = sprintf("INSERT INTO `addressTable`( `name`, `address`, `e-mail`, `phone`, `birthday`, `createDt`)
    VALUES('%s','asd','fas@kdosf.com','0939628292','2020-01-21',NOW())", implode('', $names));
    $stmt = $pdo->query($sql);
}


echo 'OK';
