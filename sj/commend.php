<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11 0011
 * Time: 22:00
 */

//命令模式 (Command)
interface Com
{
    public function excecute();
}

class turnOnTVCommand implements Com{
    private $controller;
    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function excecute()
    {
        $this->controller->turnOnTV();
    }
}

class turnOffTVCommand implements Com{
    private $controller;
    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function excecute()
    {
        $this->controller->turnOffTV();
    }
}

class Controller
{
    public function turnOnTV()
    {
        echo '打开电视';
    }
    public function turnOffTV(){
        echo '关闭电视';
    }
}
$str = 'turnOnTV'.'Command';
$do = new $str(new Controller());
$do->excecute();