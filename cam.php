<?php
error_reporting(E_ALL);
exec ("/usr/bin/cvlc \
    -q rtsp://10.0.100.85/live/h264 \
    --rate=2 \
    --video-filter=scene \
    --vout=dummy \
    --aout=dummy \
    --stop-time=5 \
    --scene-format=jpg \
    --scene-replace \
    --scene-ratio=40 \
    --scene-prefix=snap \
    --scene-path=/home/factwww/cam \
    vlc://quit \
    2>/dev/null"
);

$timestamp = exec('stat -c "%Y" snap.jpg');
$date = exec('date +"%T %F" -d @'.$timestamp);
exec ('/usr/bin/montage -pointsize 14 -font "Arial_Bold.ttf" -geometry +0+0 -background black -fill white -label "'.$date.'"  snap.jpg snap2.jpg');
header('Content-type: image/jpeg');
readfile('./snap2.jpg');
?>
