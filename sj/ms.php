<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/8 0008
 * Time: 21:03
 */
// $a1=array_fill(1,100,1);
// var_dump($a1);
$a1=array_fill(1,100,1);

$n = 2;
for($i=2;$i<=$n;$i++){
    foreach ($a1 as $k=>$v){
        $v = $k%$i ?: $v-1;
        echo $v;
    }
}