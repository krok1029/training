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
    <table>
        <?php for ($i = 0; $i < 255; $i += 17) : ?>
            <tr>
                <?php for ($j = 0; $j < 255; $j += 17) : ?>
                    <td style="background-color: #<?= sprintf("%'.02X00%'.02X", $i, $j) ?>;"></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>