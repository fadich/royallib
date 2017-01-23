<?php

namespace royallib\base\console;


use royallib\type\Matrix;

class Console extends BaseConsole
{
    protected $_params = [];

    public function __construct($argv = [])
    {
        $this->_params = (new Matrix($argv))->multiImplode(" ")->explodeElements()->value;
    }

    public function __get($name)
    {
        return $this->_params[$name] ?? null;
    }
}
