<?php
error_reporting(E_ALL);

exec ("/usr/bin/ffmpeg \
    -loglevel error \
    -i rtsp://10.0.100.85/live/h264 \
    -vframes 1 \
    -r 1 \
    -y \
    ircam.jpg"
);

$timestamp = exec('stat -c "%Y" ircam.jpg');
$date = exec('date -u +"%Y-%m-%d %H:%M:%S" -d @'.$timestamp);
exec ('/usr/bin/montage -pointsize 14 -font "Arial_Bold.ttf" -geometry +0+0 -background black -fill white -label "'.$date.'"  ircam.jpg ircam_with_date.jpg');
header('Content-type: image/jpeg');
readfile('./ircam_with_date.jpg');
?>
