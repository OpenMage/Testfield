<?php


namespace OpenMage\Testfield\Unit\Regression\Lts;

use PHPUnit\Framework\TestCase;

class Ticket1213Test extends TestCase
{

    /**
     *
     * triggered before fixing this error in newer PHP Versions:
     * "strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior"
     *
     *
     */
    public function testDefaultState()
    {
        $object = new \Mage_Eav_Model_Entity_Increment_Numeric();
        var_dump(error_reporting());


        $this->assertEquals(null, $object->getPrefix());
        $this->assertEquals(null, $object->getLastId());

        $this->assertEquals('00000001', $object->getNextId());

    }
}
