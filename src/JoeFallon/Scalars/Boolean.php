<?php
namespace JoeFallon\Scalars;

/**
 * Boolean represents a scalar boolean value. All instances are immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
class Boolean extends AbstractPrimitive
{
    /**
     * @param bool $value
     */
    public function __construct($value)
    {
        $this->_value = (bool)$value;
    }


    /**
     * @return boolean
     */
    public function getValue()
    {
        return parent::getValue();
    }
}
