<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/11 0011
 * Time: 20:22
 */
class Client
{
    private $client;

    public function __construct()
    {
        $this->client = new swoole_client(SWOOLE_SOCK_TCP);
    }

    public function connect()
    {
        if(!$this->client->connect('127.0.0.1',9501,1)){
            echo "ERROR: {$this->client->errCode}";
        }
        fwrite(STDOUT,"请输入信息:");
        $msg = trim(fgets(STDIN));
        $this->client->send($msg);

        $message = $this->client->recv();
        echo "CLIENT get message from server:{$msg}\n";

    }
}
$client = new Client();
$client->connect();