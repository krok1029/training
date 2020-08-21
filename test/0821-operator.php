<?php



$a = 13;
$b = 27;

echo var_dump($a && $b) . '<br>';
echo var_dump($a and $b) . '<br>';

$c = $a && $b;
echo var_dump($c) . '<br>';
$c = $a and $b;
echo var_dump($c) . '<br>';
