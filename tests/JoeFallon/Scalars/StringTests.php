<?php
namespace tests\JoeFallon\Scalars;

use JoeFallon\KissTest\UnitTest;
use JoeFallon\Scalars\String;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   tests\JoeFallon\Scalars
 */
class StringTests extends UnitTest
{
    public function test_value()
    {
        $valIn  = new String('string');
        $valOut = $valIn->getValue();

        $this->assertEqual('string', $valOut);
    }
}
