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
use JoeFallon\PhpLibrary\Scalars\Bool;


class BoolTests extends UnitTest
{
    public function test_value()
    {
        $valIn  = new Bool(true);
        $valOut = $valIn->getValue();

        $this->assertEqual(true, $valOut);
    }

    public function test_ctor_throws_exception_on_non_bool()
    {
        try
        {
            new Bool(5);
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
            new Bool(null);
        }
        catch(InvalidArgumentException $ex)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }
}
