<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/8 0008
 * Time: 22:34
 */

abstract class Toy
{
    public abstract function openMouse();
    public abstract function closeMouse();
    public  function ff(){
        echo 'ff';
    }

}

class Dog extends Toy
{

    public  function openMouse()
    {
        echo 'Dog open mouth \n';
    }

    public  function closeMouse()
    {
        echo 'Dog close mouth \n';
    }

}

class Cat extends Toy
{

    public  function openMouse()
    {
        echo 'Cat open mouth \n';
    }

    public  function closeMouse()
    {
        echo 'Cat close mouth \n';
    }

}

interface RedTarget
{
    public function doMouthOpen();
    public function doMouthClose();
}

interface GreenTarget
{
    public function operateMouth($type = 0);
}

class RedAdapter implements RedTarget
{
    private $adaptee;
    public function __construct(Toy $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function doMouthOpen()
    {
        $this->adaptee->openMouse();
    }

    public function doMouthClose()
    {
        $this->adaptee->closeMouse();
    }
}

class GreenAdapter implements GreenTarget
{
    private $adaptee;
    public function __construct(Toy $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function operateMouth($type = 0)
    {
       if($type){
           $this->adaptee->openMouse();
       }else{
           $this->adaptee->closeMouse();
       }
    }
}

class testDriver
{
    public function run()
    {
        //实例化一只狗玩具
        $adaptee_dog = new Dog();
        echo "给狗套上红枣适配器\n";
        $adapter_red = new RedAdapter($adaptee_dog);
        //张嘴
        $adapter_red->doMouthOpen();
        //闭嘴
        $adapter_red->doMouthClose();
        echo "给狗套上绿枣适配器\n";
        $adapter_green = new GreenAdapter($adaptee_dog);
        //张嘴
        $adapter_green->operateMouth(1);
        //闭嘴
        $adapter_green->operateMouth(0);
    }
}

$test = new testDriver();
$test->run();

$c = new Cat();
$c->ff();