<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace JoeFallon\Scalars;


class String extends AbstractPrimitive
{
    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->_value = strval($value);
    }
}
