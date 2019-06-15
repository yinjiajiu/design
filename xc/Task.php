<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/4 0004
 * Time: 21:20
 */


//任务对象
class Task
{
    protected $taskId;                //任务id
    protected $coroutine;             //生成器
    protected $sendValue = null;      //生成器send值
    protected $beforFirstYield = true;//迭代指针是否是第一个

    public function __construct(int $taskId,Generator $coroutine)
    {
        $this->taskId    = $taskId;
        $this->coroutine = $coroutine;
    }


    /**
     * @return int
     */
    public function getTaskId(): int
    {
        return $this->taskId;
    }

    /**
     * @param null $sendValue
     */
    public function setSendValue($sendValue)
    {
        $this->sendValue = $sendValue;
    }

    public function run()
    {
        if($this->beforFirstYield){
            $this->beforFirstYield = false;
            return $this->coroutine->current();
        }else{
            $retval = $this->coroutine->send($this->sendValue);
            $this->sendValue = null;
            return $retval;
        }
    }

    /**
     * @return bool
     */
    public function isFinished(): bool
    {
        return !$this->coroutine->valid();
    }

}


//任务调度
class Schedule{
    protected $maxTaskId = 0;
    protected $taskMap   = [];
    protected $taskQueue;      //任务队列

    public function __construct()
    {
        $this->taskQueue = new SplQueue();
    }

    public function newTask(Generator $coroutine) : int
    {
        $tid = ++$this->maxTaskId;
        //新增任务
        $task = new Task($tid,$coroutine);
        //$this->taskMap[$tid] = $task;
        $this->schedule($task);
        return $tid;
    }

    /*
     * 任务入列
     */
    private function schedule(Task $task)
    {
        $this->taskQueue->enqueue($task);
    }

    public function run()
    {
        while (!$this->taskQueue->isEmpty()){
            $task = $this->taskQueue->dequeue();
            $task->run();
            if($task->isFinished()){
                echo '结束';
                //unset($this->taskMap[$task->getTaskId()]);
            }else{
                $this->schedule($task);
            }
        }
    }
}

function task1(){
    for ($i=0;$i<=30;$i++){
        usleep(3000);
        echo '写入文件'.$i.PHP_EOL;
        yield $i;
    }
}

function task2()
{
    for ($i = 0; $i <= 50; $i++) {
        //发送邮件给500名会员,大概3000微秒
        usleep(3000);
        echo "发送邮件{$i}".PHP_EOL;
        yield $i;
    }
}

function task3()
{
    for ($i = 0; $i <= 10; $i++) {
        //模拟插入100条数据,大概3000微秒
        usleep(3000);
        echo "插入数据{$i}".PHP_EOL;
        yield $i;
    }
}
$schedule = new Schedule();
$schedule->newTask(task1());
$schedule->newTask(task2());
$schedule->newTask(task3());
$schedule->run();