<?php

$a = new stdClass();

class A
{
    public function test(stdClass &$a)
    {
        $a = new static();
    }
}

var_dump($a);
(new A())->test($a);
var_dump($a);
