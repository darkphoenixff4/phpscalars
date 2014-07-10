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
use JoeFallon\PhpLibrary\Scalars\Integer;


class IntegerTests extends UnitTest
{
    public function test_value()
    {
        $valIn  = new Integer(5);
        $valOut = $valIn->getValue();

        $this->assertEqual(5, $valOut);
    }


    public function test_ctor_throws_exception_on_non_int()
    {
        try
        {
            new Integer('5');
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
            new Integer(null);
        }
        catch(InvalidArgumentException $ex)
        {
            $this->testPass();

            return;
        }

        $this->testFail();
    }
}
