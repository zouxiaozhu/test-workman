<?php
use Workerman\Worker;
include "./Autoloader.php";

$work1 = new Worker("tcp://0.0.0.0:8585");
$work1->count =5;
$work1->name = 'sss';
// 没有count默认为1
$work1->onWorkerStart = function ($worker1){
   
    if($worker1->id>3){
//        \Workerman\Lib\Timer::add(1,function(){
//             echo  "4个worker进程，只在0号进程设置定时器\n";
//        });
       
         echo "4个worker进程，只在0号进程设置定时器\n"."$worker1->name";
    }
};

Worker::runAll();