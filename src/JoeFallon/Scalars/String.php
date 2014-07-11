<?php
namespace JoeFallon\Scalars;

/**
 * String is a wrapper for a scalar string value. All instances are immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
class String
{
    /** @var string */
    private $_value;


    /**
     * @param $value
     */
    public function __construct($value = '')
    {
        $this->_value = strval($value);
    }


    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }
}
