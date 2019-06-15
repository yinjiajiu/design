<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11 0011
 * Time: 23:24
 */
//访问者模式（Visitor）
abstract class Unit
{
    abstract public function getName();
    public function accept(Visitor $visitor)
    {
        $method = 'visit'.get_class($this);
        if(method_exists($visitor,$method)){
            $visitor->$method($this);
        }
    }
}

class Cpu extends Unit
{
    public function getName()
    {
        echo 'i am Cpu';
    }
}

class Memory extends Unit
{
    public function getName()
    {
        echo 'i am Memory';
    }
}

class Keyboard extends Unit
{
    public function getName()
    {
        echo 'i am Keyboard';
    }
}

interface Visitor
{
    public function visitCpu(Cpu $cpu);
    public function visitMemory(Memory $memory);
    public function visitKeyboard(Keyboard $keyboard);
}

class PrintVisitor implements Visitor
{
    public function visitCpu(Cpu $cpu)
    {
        echo 'hello'.$cpu->getName().'\n';
    }
    public function visitMemory(Memory $memory)
    {
        echo 'hello'.$memory->getName().'\n';
    }
    public function visitKeyboard(Keyboard $keyboard)
    {
        echo 'hello'.$keyboard->getName().'\n';
    }
}

class Computer
{
    protected $_items = [];
    public function add(Unit $unit)
    {
        $this->_items[] = $unit;
    }
    public function accept(Visitor $visitor)
    {
        foreach ($this->_items as $item)
        {
            $item->accept($visitor);
        }
    }
}

$computer = new Computer();
$computer->add(new Cpu());
$computer->add(new Memory());
$computer->add(new Keyboard());

$printVisitor = new PrintVisitor();
$computer->accept($printVisitor);





