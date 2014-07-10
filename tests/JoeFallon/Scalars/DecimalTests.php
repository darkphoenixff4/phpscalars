<?php
/**
 * This class represents a number of arbitrary precision. Additionally,
 * this class is immutable.
 *
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace tests\JoeFallon\PhpLibrary\Scalars;

use JoeFallon\KissTest\UnitTest;
use JoeFallon\PhpLibrary\Scalars\Decimal;


class DecimalTests extends UnitTest
{
    public function test_add()
    {
        $d1 = new Decimal('1.1');
        $d2 = new Decimal('2.2');
        $d3 = $d1->add($d2);

        $expected = '3.3';
        $actual   = $d3->toString();

        $this->assertEqual($actual, $expected);
    }


    public function test_subtract()
    {
        $d1 = new Decimal('3.3');
        $d2 = new Decimal('2.2');
        $d3 = $d1->subtract($d2);

        $expected = '1.1';
        $actual   = $d3->toString();

        $this->assertEqual($actual, $expected);
    }


    public function test_multiply()
    {
        $d1 = new Decimal('3.3');
        $d2 = new Decimal('2.2');
        $d3 = $d1->multiply($d2);

        $expected = '7.26';
        $actual   = $d3->toString();

        $this->assertEqual($actual, $expected);
    }


    public function test_divide()
    {
        $d1 = new Decimal('3.3');
        $d2 = new Decimal('2.2');
        $d3 = $d1->divide($d2);

        $expected = '1.5';
        $actual   = $d3->toString();

        $this->assertEqual($actual, $expected);
    }


    public function test_pow()
    {
        $d1 = new Decimal('3.3');
        $d2 = new Decimal('2');
        $d3 = $d1->pow($d2);

        $expected = '10.89';
        $actual   = $d3->toString();

        $this->assertEqual($actual, $expected);
    }


    public function test_compare()
    {
        $d1 = new Decimal(3.3);
        $d2 = new Decimal(2.0);
        $d3 = new Decimal(2.0);

        $expected = -1;
        $actual   = $d2->compare($d1);

        $this->assertEqual($actual, $expected);

        $expected = 1;
        $actual   = $d1->compare($d2);

        $this->assertEqual($actual, $expected);

        $expected = 0;
        $actual   = $d2->compare($d3);

        $this->assertEqual($actual, $expected);
    }


    public function test_toString()
    {
        $d1 = new Decimal('3.3');

        $expected = '3.3';
        $actual   = $d1->toString();

        $this->assertEqual($actual, $expected);
    }


    public function test_sprintf()
    {
        $d      = new Decimal(2.1);
        $format = '%04s';

        $expected = '02.1';
        $actual   = $d->sprintf($format);

        $this->assertEqual($actual, $expected);
    }
}