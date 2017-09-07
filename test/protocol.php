<?php
use Workerman\Worker;
include_once '../Autoloader.php';


$worker = new Worker("tcp://0.0.0.0:8686");
//$worker->protocol = "Wokerman\\Protocols\\Http";

$worker->onMessage =function ($connection,$data){
    var_dump($data);
    var_dump($connection);
    $connection->send("HELLO");
};
Worker::runAll();