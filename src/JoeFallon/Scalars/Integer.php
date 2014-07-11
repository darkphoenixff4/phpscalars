<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace JoeFallon\Scalars;

/**
 * Class Integer  All instances are immutable.
 *
 * @package JoeFallon\Scalars
 */
class Integer extends AbstractPrimitive
{
    /**
     * @param  int $value
     */
    public function __construct($value)
    {
        $this->_value = intval($value);
    }
}
