<?php
$accounts = [
    'shin' => [
        'pw' => '123456',
        'nickname' => '小心'
    ],
    'shin2' => [
        'pw' => '1234df56',
        'nickname' => 'aaafdkuha'
    ],
];
echo json_encode($accounts, JSON_UNESCAPED_UNICODE);
