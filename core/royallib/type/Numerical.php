<?php

namespace royallib\type;

/**
 * Class Numerical
 * @package app\components\HelpClasses\type
 *
 * @property int $value
 * @see Numerical::getValue()
 */
class Numerical extends Scalar
{
    /** @var int $_value */
    protected $_value;

    public function __construct(int $value)
    {
        parent::__construct($value);
    }

    /**
     * The getter of the $_value property.
     *
     * @return int
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Validate some string for connect integer format.
     *
     * @param string $value
     *
     * @return bool
     */
    public static function validateInt(string $value)
    {
        return (bool)preg_match('/[0-9]+$/', $value);
    }
}
