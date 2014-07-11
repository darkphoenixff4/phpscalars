<?php
namespace JoeFallon\Scalars;

/**
 * String represents a scalar string value. All instances are immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
class String extends AbstractPrimitive
{
    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->_value = strval($value);
    }


    /**
     * @return string
     */
    public function getValue()
    {
        return parent::getValue();
    }
}
