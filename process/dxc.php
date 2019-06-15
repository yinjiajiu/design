<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6 0006
 * Time: 22:52
 */
echo '开始时间:'.date('H:i:s',time());
//进程数
$work_number=6;

//
$worker=[];

//模拟地址
$curl=[
    'https://blog.csdn.net/feiwutudou',
    'https://wiki.swoole.com/wiki/page/215.html',
    'http://fanyi.baidu.com/?aldtype=16047#en/zh/manager',
    'http://wanguo.net/Salecar/index.html',
    'http://o.ngking.com/themes/mskin/login/login.jsp',
    'https://blog.csdn.net/marksinoberg/article/details/77816991'
];
//创建线程
for($i=0;$i<$work_number;$i++){
    $pro = new swoole_process(function(swoole_process $worker)use($i,$curl){
        //获取html文件
        $content = curlData($curl[$i]);
        //写入管道
        $worker ->write($content.PHP_EOL);
    },true);
    $pro_id = $pro->start();
    $worker[$pro_id]=$pro;
}

//读取管道内容
foreach ($worker as $v){
    echo $v->read().PHP_EOL;
}

//模拟爬虫
function curlData($curl_arr){
    echo $curl_arr.PHP_EOL;
    $r = file_get_contents($curl_arr);
    if(file_exists('tt.txt')){
        file_put_contents('tt.txt',$r,FILE_APPEND);
    }
   return ;
}

//进程回收
swoole_process::wait();

echo '结束时间：'.date('H:i:s',time());