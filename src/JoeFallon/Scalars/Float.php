<?php
namespace JoeFallon\Scalars;

/**
 * This class represents a number of arbitrary precision.  All instances are immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class Float extends AbstractPrimitive
{
    /**
     * @param float $value
     */
    public function __construct($value)
    {
        $this->_value = floatval($value);
    }
}
