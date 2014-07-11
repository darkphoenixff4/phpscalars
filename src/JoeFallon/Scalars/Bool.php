<?php
namespace JoeFallon\Scalars;

/**
 * Bool is a wrapper for a scalar boolean value. All instances are immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
class Bool
{
    /** @var bool */
    private $_value;


    /**
     * @param bool $value
     */
    public function __construct($value = false)
    {
        $this->_value = (bool)$value;
    }


    /**
     * @return bool
     */
    public function getValue()
    {
        return $this->_value;
    }
}
