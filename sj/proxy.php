<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13 0013
 * Time: 21:50
 */
header("Content-type:text/html;Charset=utf-8");

/**
 * Interface Subject抽象主题角色
 *
 * 定义RealSubject和Proxy共同具备的东西
 */
interface  Subject
{
    /**
     * @return mixed
     */
    public function say();
    public function run();
}

class RealSubject implements Subject
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function run()
    {
        echo $this->name.'在跑步<br>';
    }
    public function say()
    {
        echo $this->name.'在说话<br>';
    }
}

class Proxy implements Subject
{
    private $_realSubject;

    public function __construct(RealSubject $realSubject)
    {
        $this->_realSubject = $realSubject;

    }

    public function say()
    {
        $this->_realSubject->say();
    }

    public function run()
    {
        $this->_realSubject->run();
    }

}

class Client
{
    public static function test()
    {
        $subject = new RealSubject('尹家久');
        $proxy = new Proxy($subject);
        $proxy->say();
        $proxy->run();
    }
}
Client::test();