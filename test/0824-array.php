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
    $ar = array(2, 3, 4, 5);
    $ar2 = [2, 3, 4, 5];
    $ar3 = [
        'name' => 'David',
        'age' => 23,
        'data' => [5, 6, 7],
    ];

    print_r($ar);
    print_r($ar2);
    print_r($ar3);

    var_dump($ar);
    var_dump($ar2);
    var_dump($ar3);

    ?>

</body>

</html>