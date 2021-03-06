<?php
namespace JoeFallon\Scalars;

/**
 * Decimal is a class used to represent a floating point number of arbitrary precision.
 * All instances are immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
class Decimal
{
    /** @var string */
    private $_value;


    /**
     * @param Decimal|Integer|BigInt|Float|string|float|int $value
     * @return string
     * @throws \UnexpectedValueException
     */
    private static function convertToString($value)
    {
        if (method_exists($value, 'getValue')) {
            return strval($value->getValue());
        } elseif (is_numeric($value)) {
            return strval($value);
        } elseif (method_exists($value, 'toString')) {
            return $value->toString();
        } else {
            throw new \UnexpectedValueException("Unable to convert the value '$value' to a proper string!");
        }
    }


    /**
     * @param Decimal|Integer|BigInt|Float|string|float|int $value
     */
    public function __construct($value)
    {
        $this->_value = self::convertToString($value);
    }

    /**
     * This function adds $value to $this and returns a new Decimal representing the
     * result.
     *
     * @param  Decimal $value
     *
     * @return Decimal
     */
    public function add(Decimal $value)
    {
        $scale     = $this->getScale($value);
        $thisValue = $this->_value;
        $thatValue = $value->_value;
        $result    = bcadd($thisValue, $thatValue, $scale);

        return new static($result);
    }


    /**
     * This function subtracts $value from $this and returns a new Decimal representing
     * the result.
     *
     * @param  Decimal $value
     *
     * @return Decimal
     */
    public function subtract(Decimal $value)
    {
        $scale     = $this->getScale($value);
        $thisValue = $this->_value;
        $thatValue = $value->_value;
        $result    = bcsub($thisValue, $thatValue, $scale);

        return new static($result);
    }


    /**
     * This function multiplies $value by $this and returns a new Decimal representing
     * the result.
     *
     * @param  Decimal $value
     *
     * @return Decimal
     */
    public function multiply(Decimal $value)
    {
        $scale     = $this->getScale($value);
        $thisValue = $this->_value;
        $thatValue = $value->_value;
        $result    = bcmul($thisValue, $thatValue, $scale);

        return new static($result);
    }


    /**
     * This function divides $this by $value and returns a new Decimal representing the
     * result.
     *
     * @param  Decimal $value
     *
     * @return Decimal
     */
    public function divide(Decimal $value)
    {
        $scale     = $this->getScale($value);
        $thisValue = $this->_value;
        $thatValue = $value->_value;
        $result    = bcdiv($thisValue, $thatValue, $scale);

        return new static($result);
    }


    /**
     * This function raises $this to the power of $value and returns a new Decimal
     * representing the result.
     *
     * @param Decimal $value
     *
     * @return Decimal
     */
    public function pow(Decimal $value)
    {
        $scale     = $this->getScale($value);
        $thisValue = $this->_value;
        $thatValue = $value->_value;
        $result    = bcpow($thisValue, $thatValue, $scale);

        return new static($result);
    }


    /**
     * This function compares $this with the provided value. If the provided value is
     * greater than $this value, then 1 is returned. If the provided value is less than
     * $this value, -1 is returned. If the provided value is equal to $this value, 0 is
     * returned.
     *
     * Quick Reference:
     *      -1 $this < $value
     *       0 $this = $value
     *       1 $this > $value
     *
     * @param Decimal $value
     * @param float   $maxDelta The maxDelta is the maximum allowed difference between
     *                          the two values. This is required due to floats being
     *                          difficult to compare for exactness when equal.
     *                          See the IEEE floating point standard.
     *
     * @return int
     */
    public function compare(Decimal $value, $maxDelta = 0.0000001)
    {
        $scale     = $this->getScale($value);
        $thisValue = $this->_value;
        $thatValue = $value->_value;
        $delta     = bcsub($thisValue, $thatValue, $scale);
        $delta     = floatval($delta);
        $delta     = abs($delta);

        if($delta > $maxDelta)
        {
            if($thisValue < $thatValue)
            {
                return -1;
            }
            elseif($thisValue > $thatValue)
            {
                return 1;
            }
        }
        elseif($delta < $maxDelta)
        {
            return 0;
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
        $val = $this->_value;
        if (strpos($val, '.') !== false) {
            $val = rtrim($val,'0');
        }
        return rtrim($val,'.');
    }


    /**
     * @param Decimal $value
     *
     * @return int
     */
    private function getScale(Decimal $value)
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

        return $scale;
    }
}
