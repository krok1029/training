<div>
    <?php

    $str = '[{"sid":"1","name":"程式設計","parent_sid":"0"},{"sid":"2","name":"繪圖軟體","parent_sid":"0"},{"sid":"3","name":"網際網路應用","parent_sid":"0"},{"sid":"4","name":"PHP","parent_sid":"1"},{"sid":"5","name":"JavaScript","parent_sid":"1"},{"sid":"7","name":"PS","parent_sid":"2"},{"sid":"8","name":"Chrome","parent_sid":"3"},{"sid":"9","name":"騙錢的","parent_sid":"3"},{"sid":"10","name":"C++","parent_sid":"1"},{"sid":"16","name":"椅拉","parent_sid":"2"}]';

    $ar1 = json_decode($str, true);  // 關聯式陣列
    $ar2 = json_decode($str); // 一般物件


    echo $ar1[0]['name'] . '<br>';
    echo $ar2[0]->name . '<br>';

    var_dump($ar2);

    ?></div>