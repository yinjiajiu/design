<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/26 0026
 * Time: 22:45
 */
//$html = file_get_contents('https://qq52o.me/2530.html');
//$dom = new DOMDocument();
//// 从一个字符串加载HTML
//@$dom->loadHTML($html);
//// 使该HTML规范化
//$dom->normalize();
//// 用DOMXpath加载DOM，用于查询
//$xpath = new DOMXPath($dom);
//// 获取对应的xpath数据
//$hrefs = $xpath->query("//script[@type='application/ld+json']/text()");
//for ($i = 0; $i < $hrefs->length; $i++) {
//    $href = $hrefs->item($i);
//    $json = $href->nodeValue;
//}
//echo $json;
$start_time = time();
/*for ($i = 0; $i <= 500; $i++) {
    go(function ()use($i,$start_time){
        $cli = new Swoole\Coroutine\Http\Client('www.baidu.com', 443,true);
        $cli->setHeaders([
            'Host' => "www.baidu.com",
            "User-Agent" => 'Chrome/49.0.2587.3',
            'Accept' => 'text/html,application/xhtml+xml,application/xml',
            'Accept-Encoding' => 'gzip',
        ]);
        $cli->set([ 'timeout' => 0.11]);
        $cli->get('/');
        $cli->close();
        echo  "协程{$i}已完成,耗时".(time()-$start_time).PHP_EOL;
    });
}*/
$start_time = time();
for ($i = 0; $i <= 500; $i++) {
    $url     = 'https://www.baidu.com/';
    $content = file_get_contents($url);
    echo "普通{$i}已完成\n";
}
echo "非携程完成时间:" . (time() - $start_time);