<?php

$handle = fopen('php://stdin', 'r');
//get the time on 12-hour format.
fscanf($handle, '%s', $time);
//get an array with all time parts without AM or PM and convert hour to 24.
$timeArr = explode(':', str_replace(['AM', 'PM'], '', $time));
$timeArr[0] += 12;
//check if the time is AM.
if (strpos($time, 'AM') > 0) {
    $timeArr[0] = $timeArr[0] % 12;
} else {
    $timeArr[0] = $timeArr[0] % 24;
    $timeArr[0] = $timeArr[0] == 0 ? 12 : $timeArr[0];
}
//output the time on 24-hour format-
echo str_pad($timeArr[0], 2, '0', STR_PAD_LEFT).':'.$timeArr[1].':'.$timeArr[2];
//close the handle.
fclose($handle);

?>