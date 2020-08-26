<?php
session_start();

$accounts = [
    'shin' => [
        'pw' => '123456',
        'nickname' => '小新',
    ],
    'der' => [
        'pw' => '1qaz2wsx',
        'nickname' => '小明'
    ],
];

// 有沒有送出表單的 account 欄位資料
if (isset($_POST['account'])) {
    // 輸入的帳號若有對應該到陣列
    if (!empty($accounts[$_POST['account']])) {
        $a = $accounts[$_POST['account']];
        // 輸入的密碼如果和對應的陣列裡的密碼相同
        if ($_POST['password'] == $a['pw']) {
            $_SESSION['user'] = [
                'account' => $_POST['account'],
                'nickname' => $a['nickname']
            ];
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="row">
                <div class="col">
                    <div class="alert alert-info" role="alert">
                        <?= $_SESSION['user']['nickname'] ?> 您好<br>
                        <a href="./0825-logout.php">登出</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-lg-6">
                    <form method="post">
                        <div class="form-group">
                            <label for="account">Account</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./../bootstrap/js/bootstrap.js"></script>
</body>

</html>