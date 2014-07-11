<?php
namespace JoeFallon\Scalars;

/**
 * BigInt is used to represent an arbitrarily large integer.  All instances are
 * immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
final class BigInt
{
    /** @var string */
    private $_value;


    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->_value = $value;
    }


    /**
     * This function adds $value to $this and returns a new BigInt representing the
     * result.
     *
     * @param  BigInt $value
     *
     * @return BigInt
     */
    public function add(BigInt $value)
    {
        $result = bcadd($this->_value, $value->_value, 0);

        return new BigInt($result);
    }


    /**
     * This function subtracts $value from $this and returns a new BigInt representing
     * the result.
     *
     * @param  BigInt $value
     *
     * @return BigInt
     */
    public function subtract(BigInt $value)
    {
        $result = bcsub($this->_value, $value->_value, 0);

        return new BigInt($result);
    }


    /**
     * This function multiplies $this by $value and returns a new BigInt representing
     * the result.
     *
     * @param  BigInt $value
     *
     * @return BigInt
     */
    public function multiply(BigInt $value)
    {
        $result = bcmul($this->_value, $value->_value, 0);

        return new BigInt($result);
    }


    /**
     * This function divides $this by $value and returns a new BigInt representing the
     * result.
     *
     * @param  BigInt $value
     *
     * @return BigInt
     */
    public function divide(BigInt $value)
    {
        $result = bcdiv($this->_value, $value->_value, 0);

        return new BigInt($result);
    }


    /**
     * This function divides $this by $value and returns a BigInt representing the
     * modulus.
     *
     * @param  BigInt $value
     *
     * @return BigInt
     */
    public function modulus(BigInt $value)
    {
        $result = bcmod($this->_value, $value->_value);

        return new BigInt($result);
    }


    /**
     * This function compares $this with the provided value. If the provided value is
     * greater than $this value, then 1 is returned. If the provided value is less than
     * $this value, -1 is returned. If the provided value is equal to $this value, 0 is
     * returned.
     *
     * Quick Reference:
     *
     * -1 $this < $value
     *  0 $this = $value
     *  1 $this > $value
     *
     * @param BigInt $value
     *
     * @return int
     */
    public function compare(BigInt $value)
    {
        if($this->_value < $value->_value)
        {
            return -1;
        }
        else
        {
            if($this->_value > $value->_value)
            {
                return 1;
            }
        }

        return 0;
    }


    /**
     * @param string $format
     *
     * @return string
     */
    public function sprintf($format)
    {
        return sprintf($format, $this->toString());
    }


    /**
     * @return string
     */
    public function toString()
    {
        if($this->_value == 0)
        {
            return '0';
        }

        return rtrim($this->_value, '0.');
    }
}
