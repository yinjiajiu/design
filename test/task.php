<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/19 0019
 * Time: 09:50
 */
/*
function ev_timer(){
    static $i = 0;
    echo "#{$i}\alarm\n";
    $i++;
    if($i>5){
        //清除定时器
        swoole_process::alarm(-1);

        //退出进程
        swoole_process::kill(getmypid());

    }
    swoole_process::alarm(100*1000*$i*10);
}
//安装信号
swoole_process::signal(SIGALRM,'ev_timer');

//触发定时器信号 单位微妙 如果为负数则清除定时器
swoole_process::alarm(100*1000);

echo getmypid().'\n';*/


// ---------
//基础的信号-socket
// ---------

/*
//给当前php进程安装一个alarm信号处理器
//当进程收到alarm时钟信号会做出动作
pcntl_signal(SIGALRM,function(){
    echo 'tick.'.PHP_EOL;
});
//定义一个时钟时间间隔
$tick = 1;
while( true){
    //当过了tick秒钟后，向进程发送一个alarn信号
    pcntl_alarm( $tick );
    //分发信号，互换起安装好的各种信号处理器
    pcntl_signal_dispatch();
    sleep($tick);
}
*/


/*
//第一个参数是一个eventBase对象即可
//第二个参数是文件描述符，可以是一个监听socket、一个连接socket、一个fopen打开的文件或者stream流等。如果是时钟时间，则传入-1。如果是其他信号事件，用相应的信号常量即可，比如SIGHUP、SIGTERM等等
//第三个参数表示事件类型，依次是Event::READ、Event::WRITE、Event::SIGNAL、Event::TIMEOUT。其中，加上Event::PERSIST则表示是持久发生，而不是只发生一次就再也没反应了。比如Event::READ | Event::PERSIST就表示某个文件描述第一次可读的时候发生一次，后面如果又可读就绪了那么还会继续发生一次。
//第四个参数就熟悉的很了，就是事件回调了，意思就是当某个事件发生后那么应该具体做什么相应
//第五个参数是自定义数据，这个数据会传递给第四个参数的回调函数，回调函数中可以用这个数据。
$eventConfig = new \EventConfig();
$eventBase = new \EventBase($eventConfig);
$timer = new \Event($eventBase,-1,Event::TIMEOUT ,function($name)use(&$ame){//| Event::PERSIST
    echo current($ame);
},$ame = ['yinjiajiu']);
$tick = 0.05;
//创建EventConfig（非必需）
//创建EventBase
//创建Event
//将Event挂起，也就是执行了Event对象的add方法，不执行add方法那么这个event对象就无法挂起，也就不会执行
//将EventBase执行进入循环中，也就是loop方法
$timer->add($tick);
$eventBase->loop();
*/

/*
//查看当前系统平台支持的IO多路复用都有哪些
$method = \Event::getSupportedMethods();
print_r($method);
//查看当前方法用的是哪一个？Method
$eventBase = new \EventBase();
echo '当前的方法是：'.$eventBase->getMethod().PHP_EOL;

echo "特性：".PHP_EOL;
$features = $eventBase->getFeatures();
// 看不到这个判断条件的，请反思自己“位运算”相关欠缺
if( $features & EventConfig::FEATURE_ET ){
    echo "边缘触发".PHP_EOL;
}
if( $features & EventConfig::FEATURE_O1 ){
    echo "O1添加删除事件".PHP_EOL;
}
if( $features & EventConfig::FEATURE_FDS ){
    echo "任意文件描述符，不光socket".PHP_EOL;
}
*/

