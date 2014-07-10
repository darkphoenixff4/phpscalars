<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace tests\JoeFallon\PhpLibrary\Scalars;

use JoeFallon\KissTest\UnitTest;
use JoeFallon\PhpLibrary\Scalars\BigInt;


class BigIntTests extends UnitTest
{
    public function test_add()
    {
        $i1 = new BigInt(2);
        $i2 = new BigInt(3);
        $i3 = $i1->add($i2);
        
        $expected = '5';
        $actual   = $i3->toString();
        
        $this->assertEqual($actual, $expected);
    }
    
    public function test_sutract()
    {
        $i1 = new BigInt(5);
        $i2 = new BigInt(3);
        $i3 = $i1->subtract($i2);
        
        $expected = '2';
        $actual   = $i3->toString();
        
        $this->assertEqual($actual, $expected);
    }
    
    public function test_multiply()
    {
        $i1 = new BigInt(2);
        $i2 = new BigInt(3);
        $i3 = $i1->multiply($i2);
        
        $expected = '6';
        $actual   = $i3->toString();
        
        $this->assertEqual($actual, $expected);
    }
    
    public function test_divide()
    {
        $i1 = new BigInt(6);
        $i2 = new BigInt(2);
        $i3 = $i1->divide($i2);
        
        $expected = '3';
        $actual   = $i3->toString();
        
        $this->assertEqual($actual, $expected);
    }
    
    public function test_modulus()
    {
        $i1 = new BigInt(10);
        $i2 = new BigInt(3);
        $i3 = $i1->modulus($i2);
        
        $expected = '1';
        $actual   = $i3->toString();
        
        $this->assertEqual($actual, $expected);
    }
    
    public function test_compare()
    {
        $i1 = new BigInt(6);
        $i2 = new BigInt(3);

        $expected = 1;
        $actual   = $i1->compare($i2);
        
        $this->assertEqual($actual, $expected);
        
        
        $i1 = new BigInt(3);
        $i2 = new BigInt(3);

        $expected = 0;
        $actual   = $i1->compare($i2);
        
        $this->assertEqual($actual, $expected);
        
        
        $i1 = new BigInt(3);
        $i2 = new BigInt(6);

        $expected = -1;
        $actual   = $i1->compare($i2);
        
        $this->assertEqual($actual, $expected);
    }
    
    public function test_toString()
    {
        $i = new BigInt(6);

        $expected = '6';
        $actual   = $i->toString();
        
        $this->assertEqual($actual, $expected);
        
        $i = new BigInt(0);

        $expected = '0';
        $actual   = $i->toString();
        
        $this->assertEqual($actual, $expected);
        
        $i = new BigInt(-6);

        $expected = '-6';
        $actual   = $i->toString();
        
        $this->assertEqual($actual, $expected);
    }
    
    public function test_sprintf()
    {
        $i1 = new BigInt(2);
        $format = '%02s';
        
        $expected = '02';
        $actual   = $i1->sprintf($format);
        
        $this->assertEqual($actual, $expected);
    }
}