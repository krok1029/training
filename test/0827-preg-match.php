<?php
$m_pattern = '/^09\d{2}-?\d{3}-?\d{3}$/';

$r = preg_match($m_pattern, '0918-111-222222', $match);

var_dump($r);
var_dump($match);
