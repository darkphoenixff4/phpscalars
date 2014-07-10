<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace JoeFallon\Scalars;


final class BigInt
{
    /************************************************************************
     * Instance Variables
     ***********************************************************************/

    /* @var string */
    private $_value;

    /************************************************************************
     * Public Methods
     ***********************************************************************/

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->_value = $value;
    }


    /**
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
     * compare
     *
     * This function compares this Jtf_Integer with the provided value. If the
     * provided value is greater than this value, then 1 is returned. If the
     * provided value is less than this value, -1 is returned. If the provided
     * value is equal to the current value, 0 is returned.
     *
     * Quick Reference:
     *
     * -1 $this < $value
     *  0 $this = $value
     *  1 $this > $value
     *
     * @param BigInt $value
     *
     * @internal param float $maxDelta - This parameter is the maximum difference
     *           between the two values. This is because floats are very difficult
     *           to compare for exactness when equal. Reference the IEEE floating
     *           point standard.
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
