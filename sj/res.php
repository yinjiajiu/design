<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12 0012
 * Time: 22:11
 */
//责任链模式
/*
abstract class Handle
{
    private $next_Handle;
    private $lever = 0;
    abstract protected function response();
    //设置处理级别
    public function setHandleLevel($level)
    {
        $this->level = $level;
    }
    //设置下一级别的处理者
    public function setNext(Handle $handle)
    {
        var_dump($this->lever);
        $this->next_Handle = $handle;
        $this->next_Handle->setHandleLevel($this->lever++);
    }

    final public function handleMessge(Request $request)
    {
        if($this->lever == $request->getLevel()){
            $this->response();
        }else{
            if($this->next_Handle != null){
                $this->next_Handle->handleMessge($request);
            }else{
                echo '洗洗睡吧，没人理你'.PHP_EOL;
            }
        }
    }
}

//具体处理者
//组长
class HeadMan extends Handle
{
    protected function response()
    {
        echo '组长回复你：同意你的请求'.PHP_EOL;
    }
}

class Director extends Handle
{
    protected function response()
    {
        echo '主管回复你：知道了，退下'.PHP_EOL;
    }
}

class Manger extends Handle
{
    protected function response()
    {
        echo '经理回复你：容朕思虑，再议'.PHP_EOL;
    }
}

//请求类
class Request
{
    protected $level = array('请假'=>0,'休假'=>1,'辞职'=>2);
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function getLevel()
    {
        return array_key_exists($this->request,$this->level) ? $this->level[$this->request] : -1;
    }
}

$headMan  = new HeadMan();
$director = new Director();
$manger   = new Manger();
$headMan->setNext($director);
$director->setNext($manger);

$headMan->handleMessge(new Request('请假'));
$headMan->handleMessge(new Request('休假'));
$headMan->handleMessge(new Request('辞职'));
$headMan->handleMessge(new Request('加班'));*/
class borde{
    protected $power = 1;
    protected $top = 'admin';
    public function process($lev){
        if ($this->power >= $lev) {
            echo '版主删帖';
        }else{
            $jege = new $this->top;
            $jege->process($lev);
        }
    }
}
class admin{
    protected $power = 2;
    protected $top = 'policy';
    public function process($lev){
        if ($this->power>=$lev) {
            echo '管理员封号';
        }else{
            $jege = new $this->top;
            $jege->process($lev);
        }
    }
}
class policy{
    protected $power;
    protected $top = NULL;
    public function process($lev){
        echo '抓起来';
    }
}
$lev = 2;
$jege = new borde();
$jege->process($lev);