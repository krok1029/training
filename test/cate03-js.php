<?php

$categories = array(
    array('sid' => '1', 'name' => '程式設計', 'parent_sid' => '0'),
    array('sid' => '2', 'name' => '繪圖軟體', 'parent_sid' => '0'),
    array('sid' => '3', 'name' => '網際網路應用', 'parent_sid' => '0'),
    array('sid' => '4', 'name' => 'PHP', 'parent_sid' => '1'),
    array('sid' => '5', 'name' => 'JavaScript', 'parent_sid' => '1'),
    array('sid' => '7', 'name' => 'PS', 'parent_sid' => '2'),
    array('sid' => '8', 'name' => 'Chrome', 'parent_sid' => '3'),
    array('sid' => '9', 'name' => '騙錢的', 'parent_sid' => '3'),
    array('sid' => '10', 'name' => 'C++', 'parent_sid' => '1'),
    array('sid' => '16', 'name' => '椅拉', 'parent_sid' => '2')
);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Action</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        const rows = <?= json_encode($categories, JSON_UNESCAPED_UNICODE) ?>;
        console.log(rows.length)
        let htmlStr = ''
        for (let i = 0; i < rows.length; i++) {
            console.log(rows[i].parent_sid);
            if (rows[i].parent_sid == 0) {
                htmlStr += `<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">` + rows[i].name + `</a><div class="dropdown-menu" aria-labelledby="navbarDropdown">`
                for (let j = 0; j < rows.length; j++) {
                    if (rows[j].parent_sid == rows[i].sid)
                        htmlStr += `<a class="dropdown-item" href="#">` + rows[j].name + `</a>`
                }
                htmlStr += `</div></li>`
            }

        }
        document.querySelector('.navbar-nav').innerHTML = htmlStr
    </script>
</body>

</html>