<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/7 0007
 * Time: 14:13
 */
/*$process = new swoole_process(function(swoole_process $process){
    $process->write('hello yinjiajiu');
},true);
$process->start();
usleep(100);
echo $process->read();*/

$redis = new redis;
$redis->connect('127.0.0.1', 6379);

function callback_function () {
    swoole_timer_after(10000, function () {
        echo "hello world";
    });
    global $redis;
};

swoole_timer_tick(1000, function () {
    echo "parent timer\n";
});

swoole_process::signal(SIGCHLD, function ($sig) {
    while ($ret = Swoole\Process::wait(false)) {
        // create a new child process
        $p = new Swoole\Process('callback_function');
        $p->start();
    }
});

// create a new child process
$p = new Swoole\Process('callback_function');

swoole_event_add($p->pipe, function ($pipe) use ($p) {
    echo $p->read();
});

$p->start();