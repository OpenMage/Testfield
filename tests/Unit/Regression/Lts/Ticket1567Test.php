<?php


namespace OpenMage\Testfield\Unit\Regression\Lts;

use PHPUnit\Framework\TestCase;

class Ticket1567Test extends TestCase
{

    public function testMagicSetWithStartingDoubleUpperCase()
    {
        $object = new \Varien_Object();

        $object->setATestingValue('a_normal_string');

        $this->assertEquals('a_normal_string', $object->getATestingValue());
        $this->assertEquals('a_normal_string', $object->getData('a_testing_value'));
    }

    public function testSetDataWithStartingDoubleUpperCase()
    {
        $object = new \Varien_Object();

        $object->setData('a_testing_value', 'a_normal_string');

        $this->assertEquals('a_normal_string', $object->getATestingValue());
        $this->assertEquals('a_normal_string', $object->getData('a_testing_value'));
    }

    public function testMagicSetWithMiddleDoubleUpperCase()
    {
        $object = new \Varien_Object();

        $object->setMyATestingValue('a_normal_string');

        $this->assertEquals('a_normal_string', $object->getMyATestingValue());
        $this->assertEquals('a_normal_string', $object->getData('my_a_testing_value'));
    }

    public function testSetDataWithMiddleDoubleUpperCase()
    {
        $object = new \Varien_Object();

        $object->setData('my_a_testing_value', 'a_normal_string');

        $this->assertEquals('a_normal_string', $object->getMyATestingValue());
        $this->assertEquals('a_normal_string', $object->getData('my_a_testing_value'));
    }
}
