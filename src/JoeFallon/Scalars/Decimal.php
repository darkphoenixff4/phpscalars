<?php
namespace JoeFallon\Scalars;

/**
 * This class represents a number of arbitrary precision. Additionally,
 * this class is immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class Decimal
{
    /* @var string */
    private $_value;


    /**
     * __construct
     *
     * @param string $value
     */
    public function __construct($value)
    {
        $this->_value = strval($value);
    }


    /**
     * add
     *
     * @param  Decimal $value
     *
     * @return Decimal
     */
    public function add(Decimal $value)
    {
        $scale = 0;

        if(strlen($this->_value) > $scale)
        {
            $scale = strlen($this->_value);
        }
        if(strlen($value->_value) > $scale)
        {
            $scale = strlen($value->_value);
        }

        $result = bcadd($this->_value, $value->_value, $scale);

        return new Decimal($result);
    }


    /**
     * @param  Decimal $value
     *
     * @return Decimal
     */
    public function subtract(Decimal $value)
    {
        $scale = 0;

        if(strlen($this->_value) > $scale)
        {
            $scale = strlen($this->_value);
        }
        if(strlen($value->_value) > $scale)
        {
            $scale = strlen($value->_value);
        }

        $result = bcsub($this->_value, $value->_value, $scale);

        return new Decimal($result);
    }


    /**
     * @param  Decimal $value
     *
     * @return Decimal
     */
    public function multiply(Decimal $value)
    {
        $scale = 0;

        if(strlen($this->_value) > $scale)
        {
            $scale = strlen($this->_value);
        }
        if(strlen($value->_value) > $scale)
        {
            $scale = strlen($value->_value);
        }

        $result = bcmul($this->_value, $value->_value, $scale);

        return new Decimal($result);
    }


    /**
     * @param  Decimal $value
     *
     * @return Decimal
     */
    public function divide(Decimal $value)
    {
        $scale = 0;

        if(strlen($this->_value) > $scale)
        {
            $scale = strlen($this->_value);
        }
        if(strlen($value->_value) > $scale)
        {
            $scale = strlen($value->_value);
        }

        $result = bcdiv($this->_value, $value->_value, $scale);

        return new Decimal($result);
    }


    /**
     * @param Decimal $value
     *
     * @return Decimal
     */
    public function pow(Decimal $value)
    {
        $scale = 0;

        if(strlen($this->_value) > $scale)
        {
            $scale = strlen($this->_value);
        }
        if(strlen($value->_value) > $scale)
        {
            $scale = strlen($value->_value);
        }

        $result = bcpow($this->_value, $value->_value, $scale);

        return new Decimal($result);
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
     * @param Decimal $value
     *
     * @param float   $maxDelta - This parameter is the maximum difference
     *                          between the two values. This is because floats are very difficult
     *                          to compare for exactness when equal. Reference the IEEE floating
     *                          point standard.
     *
     * @return int
     */
    public function compare(Decimal $value, $maxDelta = 0.0000001)
    {
        $scale = 0;

        if(strlen($this->_value) > $scale)
        {
            $scale = strlen($this->_value);
        }
        if(strlen($value->_value) > $scale)
        {
            $scale = strlen($value->_value);
        }

        $delta = bcsub($this->_value, $value->_value, $scale);
        $delta = floatval($delta);
        $delta = abs($delta);

        if($delta > $maxDelta)
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
        }
        else
        {
            if($delta < $maxDelta)
            {
                return 0;
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
     * toString
     *
     * @return string
     */
    public function toString()
    {
        return rtrim($this->_value, '0.');
    }
}
