<?php
namespace JoeFallon\Scalars;

/**
 * BigInt is a class used to represent an arbitrarily large integer.  All instances are
 * immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\Scalars
 */
class BigInt
{
    /** @var string */
    private $_value;


    /**
     * @param BigInt|Integer|string|int $value
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
     * @param BigInt|Integer|string|int $value
     */
    public function __construct($value)
    {
        $this->_value = self::convertToString($value);
    }

    /**
     * This function adds $value to $this and returns a new BigInt representing the
     * result.
     *
     * @param  BigInt
     *
     * @return BigInt
     */
    public function add(BigInt $value)
    {
        $result = bcadd($this->_value, $value->_value, 0);

        return new static($result);
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

        return new static($result);
    }


    /**
     * This function multiplies $value by $this and returns a new BigInt representing
     * the result.
     *
     * @param  BigInt $value
     *
     * @return BigInt
     */
    public function multiply(BigInt $value)
    {
        $result = bcmul($this->_value, $value->_value, 0);

        return new static($result);
    }


    /**
     * This function divides $this by $value and returns a new BigInt representing the
     * result.
     *
     * @param  BigInt
     *
     * @return BigInt
     */
    public function divide(BigInt $value)
    {
        $result = bcdiv($this->_value, $value->_value, 0);

        return new static($result);
    }


    /**
     * This function divides $this by $value and returns a new BigInt representing the
     * modulus.
     *
     * @param  BigInt
     *
     * @return BigInt
     */
    public function modulus(BigInt $value)
    {
        $result = bcmod($this->_value, $value->_value);

        return new static($result);
    }


    /**
     * This function compares $this with the provided $value. If the provided $value is
     * greater than $this, then 1 is returned. If the provided value is less than
     * $this, -1 is returned. If the provided value is equal to $this, 0 is returned.
     *
     * Quick Reference:
     *      -1 $this < $value
     *       0 $this = $value
     *       1 $this > $value
     *
     * @param BigInt
     *
     * @return int
     */
    public function compare($value)
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

        $val = $this->_value;
        if (strpos($val, '.') !== false) {
            $val = rtrim($val, '0');
        }
        return rtrim($val, '.');
    }
}
