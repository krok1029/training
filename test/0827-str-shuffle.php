<?php
$str = "統一獅隊陳鏞基昨晚對富邦悍將隊完成生涯百盜";

function str_shuffle_unicode($str)
{
    $tmp = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    shuffle($tmp);
    return join("", $tmp);
}

echo str_shuffle_unicode($str);
