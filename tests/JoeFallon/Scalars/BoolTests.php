<?php
namespace tests\JoeFallon\Scalars;

use JoeFallon\KissTest\UnitTest;
use JoeFallon\Scalars\Bool;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   tests\JoeFallon\Scalars
 */
class BoolTests extends UnitTest
{
    public function test_value()
    {
        $valIn  = new Bool(true);
        $valOut = $valIn->getValue();

        $this->assertEqual(true, $valOut);
    }
}
