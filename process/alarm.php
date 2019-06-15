<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/7 0007
 * Time: 23:35
 */
use Swoole\Process;

Process::signal(SIGALRM, function () {
    static $i = 0;
    echo "#{$i}\talarm\n";
    $i++;
    if ($i > 20) {
        Process::alarm(-1);
    }
});

//100ms
Process::alarm(100 * 1000);