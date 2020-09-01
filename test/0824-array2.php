<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <?php
    $ar3 = [
        'name' => 'David',
        'age' => 23,
        'data' => [5, 6, 7],
    ];
    $ar4 = $ar3;
    $ar3['data'] = [9, 8, 7];
    print_r($ar3);
    print_r($ar4);

    ?>

</body>

</html>