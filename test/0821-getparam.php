<?php
// $a = isset($_GET['a']) ? $_GET['a'] : 0;
$a = $_GET['a'] ?? 0;
echo $a;
