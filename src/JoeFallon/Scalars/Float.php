<?php
/**
 * This class represents a number of arbitrary precision. Additionally,
 * this class is immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace JoeFallon\Scalars;

class Float extends AbstractPrimitive
{
    public function __construct($value)
    {
        $this->_value = floatval($value);
    }
}
