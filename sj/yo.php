<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/8 0008
 * Time: 17:31
 */

class Compents
{
    private $events = [];

    public function on($eventName,$handler,$data)
    {
        $this->events[$eventName][] = [$handler,$data];
    }

    public function trigger($serverName,$event = null)
    {
        foreach ($this->events[$serverName] as $handler)
        {
            call_user_func($handler[0],$handler[1]);
        }
    }
}

class Email
{
    public function fo($data)
    {
        echo 'send email'.$data;
        echo '<br/>';
    }
}
class Message
{
    public function send($data)
    {
        echo 'send message'.$data;
        echo '<br/>';
    }
}

class Comment extends Compents
{
    const EVENT_SEND_MESSAGE = 'send';
    public function save()
    {
        echo 'comment send success';
        echo '<br/>';
        $this->trigger(self::EVENT_SEND_MESSAGE);
    }

}

$comment = new Comment();
$eHandle = [new Email(),'fo'];
$smsHandle = [new Message(),'send'];
$comment->on(Comment::EVENT_SEND_MESSAGE,$eHandle,'FOR COMMENT');
$comment->on(Comment::EVENT_SEND_MESSAGE,$smsHandle,'FOR COMMENT');
$comment->save();