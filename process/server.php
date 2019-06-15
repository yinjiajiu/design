<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/11 0011
 * Time: 19:58
 */
class Server
{
    private $serv;
    public function __construct()
    {
        $this->serv = new swoole_server('0.0.0.0',9501,SWOOLE_PROCESS,SWOOLE_SOCK_TCP);
        $this->serv->set(
            [
                'work_num' => 2,
                'daemonize'=> false
            ]
        );
        $this->serv->on('Start',[$this,'onStart']);
        $this->serv->on('Connect',[$this,'onConnect']);
        $this->serv->on('Receive',[$this,'onReceivet']);
        $this->serv->on('Close',[$this,'onClose']);
        $this->serv->start();
    }

    public function onStart($serv)
    {
        echo 'Start\n';
    }

    public function onConnect(swoole_server $serv,$fd,$from_id)
    {
        $serv->send($fd,"CONNECT:Hello FD:{$fd}-FROM_ID:-{$from_id}");
    }

    public function onReceivet(swoole_server $serv,$fd,$from_id,$data)
    {
        echo "RECEIVE Message From Client FD:{$fd}-FROM_ID:{$from_id}-DATA:-{$data}\n";
        $serv->send($fd,$data);
    }

    public function onClose($serv,$fd,$from_id)
    {
        echo"CLOSE Client FD:{$fd}-FROM:-{$from_id}";
    }
}
$server = new Server();