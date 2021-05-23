<?php
$dir = '/usr/share/nginx/html/laravel';
echo shell_exec("cd /usr/share/nginx/html/laravel");
echo shell_exec("sudo git pull 2>&1");
?>
