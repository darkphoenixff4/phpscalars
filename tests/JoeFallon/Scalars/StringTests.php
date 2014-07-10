<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace tests\JoeFallon\PhpLibrary\Scalars;

use InvalidArgumentException;
use JoeFallon\KissTest\UnitTest;
use JoeFallon\PhpLibrary\Scalars\String;

class StringTests extends UnitTest
{
    public function test_value()
    {
        $valIn  = new String('string');
        $valOut = $valIn->getValue();

        $this->assertEqual('string', $valOut);
    }

    public function test_ctor_throws_exception_on_non_string()
    {
        try
        {
            new String(5);
        }
        catch(InvalidArgumentException $ex)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }

    public function test_ctor_throws_exception_on_null()
    {
        try
        {
            new String(null);
        }
        catch(InvalidArgumentException $ex)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }
}
