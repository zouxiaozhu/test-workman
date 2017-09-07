<?php
use Workerman\Worker;
include_once '../Workerman/Autoloader.php';

$worker = new Worker('tcp://0.0.0.0:8333');
//
//Worker::$daemonize = true;
//Worker::$stdoutFile = './connection.log';
$worker->onWorkerStart = function($worker){
      var_dump("work start ok");
    echo 111;
};


//$worker->onConnect ='a';
//function a($connection){
//        var_dump("connection from ip ".$connection->getRemoteIp());
//}
//
//$worker->onMessage = function ($connection,$data){
//    var_dump($data);
//    $connection->send('i has got '.$connection->id.' message');
//};


Worker::runAll();