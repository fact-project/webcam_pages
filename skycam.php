<?php
error_reporting(E_ALL);
include('/home/fact/php_credentials/fact_std.php');
exec ("wget -q --http-user=$user --http-password=$pass http://10.0.100.84/cgi-bin/guest/Video.cgi?media=JPEG -O skycam.jpg");
$timestamp = exec('stat -c "%Y" skycam.jpg');
$date = exec('date +"%T %F" -d @'.$timestamp);
exec ('/usr/bin/montage -pointsize 14 -font "Arial_Bold.ttf" -geometry +0+0 -background black -fill white -label "'.$date.'"  skycam.jpg skycam2.jpg');
header('Content-type: image/jpeg');
readfile('./skycam2.jpg');
?>
