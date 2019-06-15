<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/11 0011
 * Time: 22:30
 */
$chan = new chan(2);

go(function () use ($chan){
    $result = [];
    for ($i = 0; $i<2; $i++){
        $result += $chan->pop();
    }
    var_dump($result);
});

go(function () use ($chan){
   $cli = new swoole\Coroutine\Http\Client('www.qq.com',80);
   $cli ->set(['timeout'=>10]);
   $cli ->setHeaders([
       'Host' => 'www.qq.com',
       "User-Agent" => 'Chrome/49.0.2587.3',
       'Accept' => 'text/html,application/xhtml+xml,application/xml',
       'Accept-Encoding' => 'gzip',
   ]);
   $ret = $cli->get('/');
   $chan->push(['www.qq.com'=>$cli->statusCode]);
});

# 协程3
go(function () use ($chan) {
    $cli = new Swoole\Coroutine\Http\Client('www.163.com', 80);
    $cli->set(['timeout' => 10]);
    $cli->setHeaders([
        'Host' => "www.163.com",
        "User-Agent" => 'Chrome/49.0.2587.3',
        'Accept' => 'text/html,application/xhtml+xml,application/xml',
        'Accept-Encoding' => 'gzip',
    ]);
    $ret = $cli->get('/');
    // $cli->body 响应内容过大，这里用 Http 状态码作为测试
    $chan->push(['www.163.com' => $cli->statusCode]);
});