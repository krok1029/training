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
    $ar = [];
    for ($i = 1; $i <= 49; $i++) {
        $ar[] = $i;
    }
    shuffle($ar);
    print_r($ar);
    ?>

</body>

</html>