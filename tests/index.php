<?php
use JoeFallon\KissTest\UnitTest;

require('config/main.php');

new \tests\JoeFallon\Scalars\BigIntTests();
new \tests\JoeFallon\Scalars\BoolTests();
new \tests\JoeFallon\Scalars\DecimalTests();
new \tests\JoeFallon\Scalars\FloatTests();
new \tests\JoeFallon\Scalars\IntegerTests();
new \tests\JoeFallon\Scalars\StringTests();

UnitTest::getAllUnitTestsSummary();