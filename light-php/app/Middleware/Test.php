<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm
// +----------------------------------------------------------------------
// | Date: 18-12-11 下午12:43
// +----------------------------------------------------------------------
// | Author: woann <304550409@qq.com>
// +----------------------------------------------------------------------
namespace app\Middleware;
use Lib\Middleware;

class Test implements Middleware{
    public function handle($request)
    {
        //在此处理中间件判断逻辑，
        //...

        //程序最后通过验证后，返回true;
        return true;
    }
}