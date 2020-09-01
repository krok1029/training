<div>
    <?php
    date_default_timezone_set('Asia/Taipei');
    $now = date("Y-m-d H:i:s");
    $after30 = date("Y-m-d", time() + 30 * 24 * 60 * 60);
    $date1 = date("Y-m-d H:i:s", strtotime('2020-07-21'));
    $date = date("N");
    echo "now: $now<br>";
    echo "after30: $after30<br>";
    echo "date1: $date1<br>";
    switch ($date) {
        case 1:
            echo "星期一";
            break;
        case 2:
            echo "星期二";
            break;
        case 3:
            echo "星期三";
            break;
        case 4:
            echo "星期四";
            break;
        case 5:
            echo "星期五";
            break;
        case 6:
            echo "星期六";
            break;
        case 7:
            echo "星期天";
            break;
    }

    ?>




</div>