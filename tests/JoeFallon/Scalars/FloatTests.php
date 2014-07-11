<?php
namespace tests\JoeFallon\Scalars;

use JoeFallon\KissTest\UnitTest;
use JoeFallon\Scalars\Float;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   tests\JoeFallon\Scalars
 */
class FloatTests extends UnitTest
{
    public function test_value()
    {
        $valIn  = new Float(3.14);
        $valOut = $valIn->getValue();

        $this->assertEqual(3.14, $valOut, "", 0.000000000001);
    }
}
