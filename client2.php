<?php
$socket =  socket_create(AF_INET, SOCK_STREAM, SOL_TCP );
socket_connect($socket ,'0.0.0.0', 9234 );
$str = 'woshi 张龙';
socket_write($socket,$str,strlen($str));
$out = socket_read($socket,9233);
echo $out;