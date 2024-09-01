<?php 
date_default_timezone_set("Asia/Dhaka");
echo date("d/M/Y h:i:s a (D)")."<br>";
//mktime
$mybirthday= mktime(0,0,0,01,01,2004);
echo date("d-F-Y (D)",$mybirthday);

?>