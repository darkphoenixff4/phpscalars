<?php
namespace JoeFallon\Scalars;

/**
 * Integer is a wrapper for a scalar int value. All instances are immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
class Integer
{
    /** @var int */
    private $_value;


    /**
     * @param  int $value
     */
    public function __construct($value = 0)
    {
        $this->_value = intval($value);
    }


    /**
     * @return int
     */
    public function getValue()
    {
        return $this->_value;
    }
}
