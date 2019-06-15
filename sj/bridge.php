<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/10 0010
 * Time: 21:41
 */

abstract class Color
{
    abstract public function run();
}

class Red extends Color
{
    public function run()
    {
        echo '红色';
    }
}

class Yellow extends Color
{
    public function run()
    {
        echo '黄色';
    }
}

class Green extends Color
{
    public function run()
    {
        echo '绿色';
    }
}

abstract class Graph
{
    protected $color;
    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    abstract public function draw();

}

class Square extends Graph
{
    public function draw()
    {
        echo "画一个{$this->color->run()}的正方形";
    }
}

class Triangle extends Graph
{
    public function draw()
    {
        echo "画一个{$this->color->run()}的三角形";
    }
}

class Circle extends Graph
{
    public function draw()
    {
        echo '画一个'.$this->color->run().'的圆形';
    }
}

function run()
{
    $red = new Red();
    $yellow = new Yellow();
    $green = new Green();

    // 红色的正方形
    $redSquare = new Square($red);
    $redSquare->draw();
    echo '<hr>';

    // 黄色的正方形
    $yellowSquare = new Square($yellow);
    $yellowSquare->draw();
    echo '<hr>';

    // 绿色的正方形
    $greenSquare = new Square($green);
    $greenSquare->draw();
    echo '<hr>';


    // 红色的三角形
    $redTriangle = new Triangle($red);
    $redTriangle->draw();
    echo '<hr>';

    // 黄色的三角形
    $yellowTriangle = new Triangle($yellow);
    $yellowTriangle->draw();
    echo '<hr>';

    // 绿色的三角形
    $greenTriangle = new Triangle($green);
    $greenTriangle->draw();
    echo '<hr>';


    // 红色的圆形
    $redCircle = new Circle($red);
    $redCircle->draw();
    echo '<hr>';

    // 黄色的圆形
    $yellowCircle = new Circle($yellow);
    $yellowCircle->draw();
    echo '<hr>';

    // 绿色的圆形
    $greenCircle = new Circle($green);
    $greenCircle->draw();
    echo '<hr>';
}

run();