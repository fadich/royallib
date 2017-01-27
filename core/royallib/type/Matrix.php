<?php

namespace royallib\type;


/**
 * Class Matrix
 * @package royallib\type
 *
 * @author Fadi Ahmad <fadich95@gmail.com>
 */
class Matrix extends Mixed
{
    protected $_temp;

    /**
     * TODO: describe \royallib\type\Matrix::map()
     *
     * @param $from
     * @param $to
     *
     * @return static
     * @throws \Exception
     */
    public function map($from, $to)
    {
        $fromCol = array_column($this->value, $from);
        $toCol   = array_column($this->value, $to);
        $size    = sizeof($this->value);
        $sizeFr  = sizeof($fromCol);
        $sizeTo  = sizeof($toCol);
        $error   = "";
        if ($size !== $sizeFr) {
            $error .= " - cannot getting column {$from} \n";
        }
        if ($size !== $sizeTo) {
            $error .= " - cannot getting column {$to} \n";
        }
        if ($error) {
            throw new \Exception("Error:\n" . $error . "\nCheck an array columns names");
        }
        for ($i = 0; $i < $size; $i++) {
            $res[$fromCol[$i]] = $toCol[$i];
        }
        $this->_value = $res ?? [];
        return $this;
    }

    /**
     * @param string $glue
     *
     * @return mixed|null
     */
    public function multiImplode($glue = "")
    {
        $this->_temp = $this->value;
        $parent = parent::multiImplode($glue)->value;
        $this->_value = $this->_temp;
        return $parent;
    }

    /**
     * Value setter.
     *
     * @param array $array
     *
     * @throws \TypeError
     */
    public function setValue($array)
    {
        if (!is_array($array)) {
            throw new \TypeError("Value should be an array " . gettype($array) . " given");
        }
        $this->_value = $array;
    }
}
