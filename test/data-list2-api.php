<?php
require __DIR__ . '/0825-parts/__connectDb.php';
$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$t_sql = "SELECT count(1) FROM addressTable ";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);
$output = [
    'perPage' => $perPage,
    'totalRows' => 0,
    'totalPages' => 0,
    'page' => 0,
    'rows' => []
];
$output['totalRows'] = $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$output['totalPages'] = $totalPages = ceil($totalRows / $perPage);
$rows = [];



if ($totalRows > 0) {
    if ($page < 1) $page = 1;
    if ($page > $totalPages) $page = $totalPages;


    $output['page'] = $page;
    $sql = sprintf("SELECT * FROM addressTable order by id desc LIMIT %s ,%s ", ($page - 1) * $perPage, $perPage);

    $stmt = $pdo->query($sql);
    $output['rows'] = $stmt->fetchAll();
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
