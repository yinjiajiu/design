<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21 0021
 * Time: 22:34
 */

if (!extension_loaded('redis')) {
    exit('请先安装redis扩展');
}

$redis = new Redis();

if ($redis->connect('127.0.0.1', 6379)) {
    if(!$redis->auth('yjj94824')){
        exit('连接密码错误');
    }
    echo "success\n";
} else {
    exit('连接失败');
}
//但它以毫秒为单位设置 key 的生存时间
//$redis->psetex('key', 100, 'value');
//echo $redis->pttl('key');
//echo $redis->get('key');

//获取锁头的key
//var_dump($redis->keys('*'));

//echo $redis->get('name');

//$redis ->sAdd('set1','yyy','yyy2','iii1','yyy3','yyy4');
//$redis ->sAddArray('set1',['yyy','yyy2','iii1','yyy3','yyy4']);

print_r( $redis->keys('*'));
?>