<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!empty($_GET['age']) and $_GET['age'] >= 18) :
    ?>
        <img src="../img/cat-old.jpg" alt="" srcset="" style="height: 250px; width:250px;object-fit:cover ">
    <?php else : ?>
        <img src="../img/cat-one.jpg" alt="" srcset="" style="height: 250px; width:250px;object-fit:cover">
    <?php endif ?>
</body>

</html>