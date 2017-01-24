<?php

namespace royallib\base\console;


use royallib\base\Interact;
use royallib\type\Matrix;

/**
 * Class Command
 *
 * // TODO: describe the class
 *
 * @package royallib\base\console
 *
 * @property array $execute      The results of the outputs.
 * @see \royallib\base\console\Command::getExecute()
 *
 *
 * @method Command cls($_ = null)                            "cls" command
 * @method Command dir($params = null, $_ = null)            "dir" command
 * @method Command ipconfig($_ = null)                       ...
 * @method Command ifconfig($_ = null)                       ...
 * @method Command cd($params = null, $_ = null)             etc...
 * @method Command php($params = null, $_ = null)            ...
 * @method Command mysql($params = null, $_ = null)          ...
 * @method Command mysqldump($params = null, $_ = null)      ...
 *
 * @author Fadi Ahmad
 */
class Command extends Interact
{
    protected $_output   = [];
    protected $_commands = [];

    public function command(string $command)
    {
        $this->_commands[] = $command;
        return $this;
    }

    public function getExecute()
    {
        $output = $this->executeAll()->_output;
        $this->_output = [];
        return $output;
    }

    /**
     * TODO: describe Console::__call() method
     *
     * @param string $name
     * @param array  $params
     *
     * @return static
     */
    public function __call($name, $params)
    {
        $params = func_get_args();
        array_shift($params);
        $params = (new Matrix($params))->multiImplode(" ");
        return $this->command("{$name} {$params}");
    }

    protected function executeAll()
    {
        foreach ($this->_commands as $command) {
            $this->_output[] = shell_exec($command);
        }
        return $this;
    }
}
