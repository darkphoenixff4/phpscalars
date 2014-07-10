<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace JoeFallon\Scalars;


abstract class AbstractPrimitive
{
    /** @var mixed */
    protected $_value;


    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }
}
