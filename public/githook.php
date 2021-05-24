<?php
$cmd = "cd /usr/share/nginx/html/laravel  && git reset --hard origin/master && sudo git pull origin master 2>&1";
$res = array();
exec($cmd, $res);
var_dump($res);
