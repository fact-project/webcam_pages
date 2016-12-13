<?php
error_reporting(E_ALL);
exec ("/usr/bin/cvlc \
    -q rtsp://10.0.100.87/live/h264 \
    --rate=2 \
    --video-filter=scene \
    --vout=dummy \
    --aout=dummy \
    --stop-time=5 \
    --scene-format=jpg \
    --scene-replace \
    --scene-ratio=40 \
    --scene-prefix=lidcam \
    --scene-path=/home/factwww/cam \
    vlc://quit \
    2>/dev/null"
);
$timestamp = exec('stat -c "%Y" lidcam.jpg');
$date = exec('date +"%T %F" -d @'.$timestamp);
exec ('/usr/bin/montage -pointsize 25 -font "Arial_Bold.ttf" -geometry +0+0 -background black -fill white -label "'.$date.'"  lidcam.jpg lidcam2.jpg');
header('Content-type: image/jpeg');
readfile('./lidcam2.jpg');
?>


