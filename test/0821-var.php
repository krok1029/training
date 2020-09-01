<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a = 123;
    echo $a . '<br>';
    echo  '$a<br>';
    echo "$a<br>";
    echo !empty($b);
    echo '<br>';
    echo '$a<br>';
    echo "$a<br>";
    echo "\$a<br>";
    echo "\n\"<br>";
    echo '\n\" \'\\<br>
123<br>
';
    $name = "Victor";
    echo "Hello, $name<br>";
    echo "Hello, {$name}456<br>";
    echo "Hello, ${name}456<br>";

    echo "123" + "10";
    echo "<br>";
    # $c = "bill";
    echo $c ?? 'peter';

    ?>
</body>

</html>