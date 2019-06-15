<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/11 0011
 * Time: 21:25
 */
class Tick{
    protected $count = 1;
    public function go()
    {
        $str = 'Say';
        $timer_id = swoole_timer_tick(3000,function ($timer_id,$params)use($str){
            $nc = ++$this->count;
            if($nc>5){
                echo $timer_id;
                swoole_timer_clear($timer_id);
            }
            echo  $str.$params;
        },' hello');
    }
}

$ti = new Tick();
$ti->go();
