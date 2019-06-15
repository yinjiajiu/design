<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11 0011
 * Time: 22:29
 */

//状态模式（State）
class Shop
{
    private $handler;
    public $state;
    public function __construct()
    {
        $this->state = 'female';
        $this->handler = new maleHandle();
    }

    public function setHandle(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function show()
    {
        $this->handler->handle($this);
    }

}

interface Handler
{
    public function handle(Shop $shop);
}

class femaleHandle implements Handler
{
    public function handle(Shop $shop)
    {
        if($shop->state=='female'){
            echo '女性';
        }else{
            $shop->setHandle(new maleHandle());
            $shop->show();
        }
    }
}

class maleHandle implements Handler
{
    public function handle(Shop $shop)
    {
        if($shop->state=='male'){
            echo '男性';
        }else{
            $shop->setHandle(new femaleHandle());
            $shop->show();
        }
    }
}


$shop = new Shop();
$shop->state = 'male';
$shop->show();

$shop->state = 'female';
$shop->show();