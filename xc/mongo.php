<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5 0005
 * Time: 22:35
 */
/*$manger = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$document = [
                '_id'=>new MongoDB\BSON\ObjectID(),
                'name'=>'yinjaijiu'
            ];
$bulk = new MongoDB\Driver\BulkWrite();
$_id = $bulk->insert($document);
var_dump($_id);
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
$result = $manger->executeBulkWrite('test.yjj',$bulk,$writeConcern);*/

//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// 插入数据
//$bulk = new MongoDB\Driver\BulkWrite;
//$bulk->insert(['x' => 1, 'name'=>'菜鸟教程', 'url' => 'http://www.runoob.com']);
//$bulk->insert(['x' => 2, 'name'=>'Google', 'url' => 'http://www.google.com']);
//$bulk->insert(['x' => 3, 'name'=>'taobao', 'url' => 'http://www.taobao.com']);
//$manager->executeBulkWrite('test.sites', $bulk);

//修改数据
//$bulk = new MongoDB\Driver\BulkWrite();
//$bulk->update(
//    ['x'=>2],
//    ['$set'=>['name'=>'菜鸟工具','url'=>'tool.runoob.com']],
//    ['multi'=>false,'upsert'=>false]
//);
//$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
//$result = $manager->executeBulkWrite('test.sites', $bulk, $writeConcern);

//查询数据
//$filter = ['x'=>['$gt'=>1]];
//$options = [
//    'projection' => ['_id' => 0],
//    'sort'       => ['x' => -1],
//];
//$query = new MongoDB\Driver\Query($filter,$options);
//$cursor = $manager->executeQuery('test.sites',$query);
//foreach ($cursor as $docuent){
//    print_r($docuent);
//}

$manger = new MongoDB\Driver\Manager("mongodb://localhost:27017");
var_dump($manger);