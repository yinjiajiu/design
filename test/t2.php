<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/20 0020
 * Time: 22:59
 */

/**
 * Class Di
 * @property People
 */
class Di implements ArrayAccess
{
    /**
     * 单例
     * @var null
     */
    protected static $instance = null;

    /**
     * 注册的服务
     * @var array
     */
    protected $data = array();

    public function __construct()
    {
        echo '__construct'. "\n";
    }

    public function onConstruct(){
        echo 'onConstruct'. "\n";
    }

    public static function one(){
        if (self::$instance == null) {
            self::$instance = new Di();
            self::$instance->onConstruct();
        }
        return self::$instance;
    }

    public function get($name, $default = NULL) {
        if (!empty($default)) {
            return $default;
        }

        return $this->data[$name];
    }

    public function set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __set($name, $value)
    {
        $this->set($name, $value);
    }


    /** ArrayAccess数组访问接口 **/

    public function offsetSet($offset, $value) {
        $this->set($offset, $value);
    }

    public function offsetGet($offset) {
        return $this->get($offset, NULL);
    }

    public function offsetUnset($offset) {
        unset($this->data[$offset]);
    }

    public function offsetExists($offset) {
        return isset($this->data[$offset]);
    }

}

class People {

    protected $name = '测试';
    public function getName(){
        return $this->name;
    }

}

class Email {

    public function sendEmail($email){
        return '邮件发送成功！';
    }

}

//$di = Di::one();
///** @var get set 方式访问 people */
//$di->people = new People();
//$people = $di->people;
//echo $di->people->getName();
//
///** 通过数组的方式访问 **/
//$di['Email'] = new Email();
//echo $di['Email']->sendEmail('33@qq.com');
