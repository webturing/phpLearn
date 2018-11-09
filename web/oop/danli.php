<?php

class Danli
{

    private static $_instance;

    private function __construct()
    {
        echo 'This is a Constructed method;';
    }

    public function __clone()
    {
        trigger_error('Clone is not allow!', E_USER_ERROR);
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function test()
    {
        echo 'test';
    }

}

// $danli = new Danli();

$danli = Danli::getInstance();
$danli->test();

$danli_clone = clone $danli;
?>