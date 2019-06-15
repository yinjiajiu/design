<?php

//事件的基类
class BaseEvent
{
    private static $observer;

//添加观察者
    public function addObserver($obj)
    {
        self::$observer[] = $obj;
    }

//触发事件、通知所有的观察者
    public function trigger()
    {
        foreach (self::$observer as $observer) {
            $observer->update();
        }
    }
}

//作为观察者要实现的接口
interface ObserverInterface
{
    public function update();
}

//具体的一个事件类、要继承事件基类
class Ev extends BaseEvent
{
    public function test()
    {
//执行事件
        echo 'test execute success. notify observer <br />';
        $this->trigger();
    }
}

//观察者实现接口
class Observer1 implements ObserverInterface
{
    public function update()
    {

        echo 'observer 1 update<br />';
    }
}

class Observer2 implements ObserverInterface
{
    public function update()
    {
        echo 'observer 2 update<br />';
    }
}


$e = new Ev();
//添加两个观察者
$e->addObserver( new Observer1());
$e->addObserver( new Observer2());

$e->test();
