<?php
use Workerman\Worker;
use Workerman\Lib\Timer;
require_once '../Workerman/Autoloader.php';

$worker = new Worker('text://0.0.0.0:2020');
// 进程启动时设置一个定时器，定时向所有客户端连接发送数据
Worker::$daemonize = true;  // 以守护进程的形式运行
Worker::$stdoutFile ='./stdout.log';
$worker->onWorkerStart = function($worker)
{
    
    // 定时，每10秒一次
    Timer::add(10, function()use($worker)
    {
        // 遍历当前进程所有的客户端连接，发送当前服务器的时间
        foreach($worker->connections as $connection)
        {
            if($connection->id == 1){
                $connection->send(time());
            }
         
        }
    });
};
// 运行worker
Worker::runAll();