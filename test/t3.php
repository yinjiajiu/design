<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4 0004
 * Time: 22:56
 */
/*$start = [0, 9, 523, 94, 10, 4];
$start2 = [20,913,8223767,91,20,3];

function arr_to_max($arr){
    if (!is_array($arr)) return false;
    foreach ($arr as $value) {
        if ($value < 0) return false;
    }
    $repeat = strlen(max($arr));
    $change = array_map(function ($v)use($repeat){
        if($v){
            return str_pad($v,$repeat,9);
        }
        return $v;
    },$arr);
    arsort($change);
    $str = '';
    foreach($change as $k=>$v){
        $str.=$arr[$k];
    }
    return $str;
}

go(function(){
    echo 1;
});
go(function(){
    echo 2;
});

echo arr_to_max($start2);*/

$data = [
    [
        'id'=>'a8856',
        'date'=>'20100612'
    ],
    [
        'id'=>'a8856',
        'date'=>'20180102'
    ],
    [
        'id'=>'top856',
        'date'=>'20100612'
    ],
    [
        'id'=>'c8236',
        'date'=>'20100612'
    ],
    [
        'id'=>'e2569',
        'date'=>'20010612'
    ],
    [
        'id'=>'e2569',
        'date'=>'20150825'
    ]
];
foreach($data as $v){
    if(!isset($arr[$v['id']])){
        $arr[$v['id']] = $v;
    }elseif($arr[$v['id']]['date'] < $v['date']){
        $arr[$v['id']]['date'] = $v['date'];
    }
}
$new = array_values($arr);