<?php
session_start();



?>

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

    if (isset($_SESSION['myvar'])) {
        $_SESSION['myvar']++;
    } else {
        $_SESSION['myvar'] = 1;
    }
    echo $_SESSION['myvar'];
    ?>
</body>
<script>
    const table = document.querySelector('table').addEventListener('click', (event) => {
        const t = event.target; ///target : 最裡面的element
        console.log(t.style.backgroundColor);
    })
</script>

</html>