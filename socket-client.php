<?php

$socket =  socket_create(AF_INET, SOCK_STREAM, SOL_TCP );
socket_connect($socket ,'0.0.0.0', 2347 );
$str = 'woshi wcc';
socket_write($socket,$str,strlen($str));
$out = socket_read($socket,2347);
echo $out;
//socket_close( $socket );


