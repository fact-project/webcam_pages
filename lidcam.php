<?php
error_reporting(E_ALL);

exec ("/usr/bin/ffmpeg \
    -loglevel error \
    -i rtsp://10.0.100.87/live/h264 \
    -vframes 1 \
    -r 1 \
    lidcam.jpg"
);

$timestamp = exec('stat -c "%Y" lidcam.jpg');
$date = exec('date +"%T %F" -d @'.$timestamp);
exec ('/usr/bin/montage -pointsize 25 -font "Arial_Bold.ttf" -geometry +0+0 -background black -fill white -label "'.$date.'"  lidcam.jpg lidcam_with_date.jpg');
header('Content-type: image/jpeg');
readfile('./lidcam_with_date.jpg');
?>


