<?php
require __DIR__ . '/0825-parts/__connectDb.php';
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'data-list.php';
if (empty($_GET['id'])) {
    header('Location: ' . $referer);
    exit;
}
$id = intval($_GET['id']) ?? 0;

$pdo->query("DELETE FROM addressTable WHERE id = $id ");

header('Location: ' . $referer);
exit;
