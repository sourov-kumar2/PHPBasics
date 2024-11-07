<?php 
date_default_timezone_set("Asia/Dhaka");
echo date("d/M/Y h:i:s a (D)")."<br>";
//mktime
$mybirthday= mktime(0,0,0,01,01,2025);
echo date("d-F-Y (D)",$mybirthday)."<br>";
//str to time
$time1=strtotime("next friday");
echo date("d-F-Y (D)",$time1)."<br>";
$time2=strtotime("+3 year +3 month +3 week +5 day");
echo date("d-F-Y (D)",$time2)."<br>";
//find the gap between two dates
$today=strtotime("today");
$mybirthday= strtotime("01 January 2025");
$gap=($mybirthday-$today)/(60*60*24);
echo "There are ".$gap." days left for my birthday";
?>