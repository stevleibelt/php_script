<?PHP
//?M8NF6bqLFwOakbjV8E9UqboA=qWb7HeXTVX1kvpHurqhFXjoFW6rlpIcaI2Km&oVHTwrkUv5lJmS5BWPjqIIuSGBSsjYE0fZZRwz5Ac0oQ6GFRmzmJNf57CX4Nsx78mBvrJYlUAM6mvVxnvDWUUHLjY8EvUIZnjkOezDod0B7zVQgML62eyRyFpkc2CZZI=kLm8C2XyuH03RbMsa7zcoYRahPe8CqiYfzvjCgaOGkeHXhrBrNkDeRxxySbMbzsGDmwdsQzCTN9C0W1aVk4D2RPkUNkhFvreESzAcT5p8r3gZwGVCVozWPmQCVWcCTBK9OJr245nZA5l1V0nePP5ebccED7nJRK9DUZ3kvjwNEmRnzXP4hO9lPMfCkVXS638fZf2
$date = (int)date('ym').'01';
//int mktime  ([ int $Stunde  [, int $Minute  [, int $Sekunde  [, int $Monat  [, int $Tag  [, int $Jahr  [, int $is_dst  ]]]]]]] )
$mktime = mktime(0, 0, 0, date('m'), 1, date('y'));
$nextMonth = mktime(0, 0, 0, date('m')+1, 1, date('y'));

echo '<br>date::'.$date;
echo '<br>mktime::'.$mktime;
echo '<br>nextMonth::'.$nextMonth;
echo '<br>thisDate::'.date("d-F-Y", $mktime);
echo '<br>nextDate::'.date("d-F-Y", $nextMonth);
echo '<br>';
echo '<br>thisMonth::'.(int)date('ymd', $mktime);
echo '<br>nextMonth::'.(int)date('ymd', $nextMonth);
?>