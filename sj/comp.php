<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12 0012
 * Time: 23:14
 */

//组合模式（Composite）
interface RenderableInterface
{
    public function render(): string;
}
//必须继承顶层渲染接口
class Form implements RenderableInterface
{
    private $elements;
    //这里很关键，相当于是批量处理接口实现类
    public function render(): string
    {
        $formCode = '<form>';
        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }
        $formCode .= '</form>';
        echo $formCode;
        return $formCode;
    }
    //这个方法用来注册 接口实现类
    public function addElement(RenderableInterface $element)
    {
        $this->elements[] = $element;
    }
}

class TextElement implements RenderableInterface
{
    private $text;
    public function __construct(string $text)
    {
        $this->text = $text;
    }
    public function render(): string
    {
        return $this->text;
    }
}

class InputElement implements RenderableInterface
{
    public function render(): string
    {
        return '<input type="text" />';
    }
}

//先建立一个表单
$form = new Form();

//在表单中增加一个Email元素
$form->addElement(new TextElement('Email:'));
$form->addElement(new InputElement());
//在表单中增加一个密码元素
$form->addElement(new TextElement('Password:'));
$form->addElement(new InputElement());
//把表单渲染出来
$form->render();

