<?php

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
    echo "socket_create() 失败的原因是:" . socket_strerror($sock) . "\n";
}
if (($ret = socket_bind($sock, '0.0.0.0', 9234)) < 0) {
    echo "socket_bind() 失败的原因是:" . socket_strerror($ret) . "\n";
}
if (($ret = socket_listen($sock, 4)) < 0) {
    echo "socket_listen() 失败的原因是:" . socket_strerror($ret) . "\n";
}
do {
    if (($msgsock = socket_accept($sock)) < 0) {
        echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
        break;
    } else {
        file_put_contents('./xxx', var_export($msgsock, 1));
        $buf = socket_read($msgsock, 8192);
        //发到客户端
        $msg = "测试成功！\n";
        socket_write($msgsock, $msg, 1);
        echo "测试成功了啊\n";
        $talkback = "收到的信息:$buf\n";
        echo $talkback;
        
        if (++$count >= 5) {
            break;
        };
    }
    //echo $buf;
    socket_close($msgsock);
} while (true);