<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/11 0011
 * Time: 21:18
 */

class AfterTime
{
    private $str = '尹加久';

    public function onAfter()
    {
        echo $this->str;
    }
}
//只会执行一次
$at = new AfterTime();
swoole_timer_after(1000,[$at,'onAfter']);
swoole_timer_after(2000,function($ha)use($at){
    $at->onAfter();
    echo $ha;
},'哈哈');