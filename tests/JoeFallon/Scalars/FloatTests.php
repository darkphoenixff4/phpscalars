<?php
/**
 * Created by JetBrains PhpStorm.
 * User: joe
 * Date: 11/10/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */
class Jtf_FloatTests extends KissUnitTest
{
    public function test_value()
    {
        $valIn  = new Jtf_Float(3.14);
        $valOut = $valIn->getValue();

        $this->assertEqual(3.14, $valOut, "", 0.000000000001);
    }

    public function test_ctor_throws_exception_on_non_float()
    {
        try
        {
            new Jtf_Float(5);
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
            new Jtf_Float(null);
        }
        catch(InvalidArgumentException $ex)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }
}
