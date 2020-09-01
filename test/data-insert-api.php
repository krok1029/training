<?php
require __DIR__ . '/0825-parts/__connectDb.php';
require __DIR__ . '/0825-parts/__admin_required.php';



// const email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
// const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => '',
];
//TODO 檢查資料格式
if (mb_strlen($_POST['name']) < 2) {
    $output['code'] = 401;
    $output['error'] = 'name length is  wrong';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (!preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $_POST['phone'])) {
    $output['code'] = 420;
    $output['error'] = '手機號碼格式錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}





$sql = "INSERT INTO `addressTable`( `name`, `address`, `email`, `phone`, `birthday`, `createDt`)
VALUES(?,?,?,?,?,NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['address'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['birthday']
]);

if ($stmt->rowCount()) {
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
