<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <?php for ($i = 0; $i < 10; $i++) : ?>
                <td> <?= $i ?></td>

            <?php endfor; ?>
        </tr>

    </table>
    <table border="1">
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <tr>
                <td> <?= $i ?></td>

            </tr>
        <?php endfor; ?>

    </table>

    <table border="1">
        <?php for ($j = 1; $j < 10; $j++) : ?>
            <tr>
                <?php for ($i = 1; $i < 10; $i++) : ?>
                    <!-- <td> <?= $i * $j ?></td> -->
                    <td> <?php printf('%s x %s = %s', $j, $i, $j * $i) ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>