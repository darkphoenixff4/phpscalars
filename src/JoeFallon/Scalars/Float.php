<?php
namespace JoeFallon\Scalars;

/**
 * Float is a wrapper for a scalar float value. All instances are immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
class Float
{
    /** @var float */
    private $_value;


    /**
     * @param float $value
     */
    public function __construct($value = 0.0)
    {
        $this->_value = floatval($value);
    }


    /**
     * @return float
     */
    public function getValue()
    {
        return $this->_value;
    }
}
