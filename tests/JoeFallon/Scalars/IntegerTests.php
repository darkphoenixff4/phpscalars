<?php
namespace tests\JoeFallon\Scalars;

use JoeFallon\KissTest\UnitTest;
use JoeFallon\Scalars\Integer;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   tests\JoeFallon\Scalars
 */
class IntegerTests extends UnitTest
{
    public function test_value()
    {
        $valIn  = new Integer(5);
        $valOut = $valIn->getValue();

        $this->assertEqual(5, $valOut);
    }
}
