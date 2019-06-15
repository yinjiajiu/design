<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/7 0007
 * Time: 22:52
 */
$worker_num = 2;
$process_pool = [];

$process= null;
$pid = posix_getpid();

function sub_process(swoole_process $worker)
{
    sleep(1); //防止父进程还未往消息队列中加入内容直接退出
    echo "worker ".$worker->pid." started".PHP_EOL;
    while($msg = $worker->pop()){
        if ($msg === false) {
            break;
        }
        $sub_pid = $worker->pid;
        echo "[$sub_pid] msg : $msg".PHP_EOL;
        sleep(1);//这里的sleep模拟任务耗时，否则可能1个worker就把所有信息全接受了
    }
    echo "worker ".$worker->pid." exit".PHP_EOL;
    $worker->exit(0);
}

$customMsgKey = 1;
$mod = 2 | swoole_process::IPC_NOWAIT;//这里设置消息队列为非阻塞模式

//创建worker进程
for($i=0;$i<$worker_num; $i++) {
    $process=new swoole_process('sub_process');
    $process->useQueue($customMsgKey, $mod);
    $process->start();
    $pid = $process->pid;
    $process_pool[$pid] = $process;
}

$messages = [
    "Hello World!",
    "Hello Cat!",
    "Hello King",
    "Hello Leon",
    "Hello Rose"
];
//由于所有进程是共享使用一个消息队列，所以只需向一个子进程发送消息即可
$process = current($process_pool);
foreach ($messages as $msg) {
    $process->push($msg);
}

swoole_process::wait();
swoole_process::wait();

echo "master exit".PHP_EOL;