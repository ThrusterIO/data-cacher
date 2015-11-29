<?php

namespace Thruster\Component\DataCacher\Tests;

use Thruster\Component\DataCacher\DataCachers;

/**
 * Class DataCachersTest
 *
 * @package Thruster\Component\DataCacher\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class DataCachersTest extends \PHPUnit_Framework_TestCase
{
    public function testAddCacher()
    {
        $cacherMock = $this->getMockForAbstractClass('\Thruster\Component\DataCacher\DataCacher', [], '', false);

        $cachers = new DataCachers();

        $this->assertFalse($cachers->hasCacher('demo'));

        $cachers->addCacher('demo', $cacherMock);

        $this->assertTrue($cachers->hasCacher('demo'));

        $this->assertEquals($cacherMock, $cachers->getCacher('demo'));

        $cachers->removeCacher('demo');

        $this->assertFalse($cachers->hasCacher('demo'));
    }

    /**
     * @expectedException \Thruster\Component\DataCacher\Exception\DataCacherNotFoundException
     * @expectedExceptionMessage DataCacher "demo" not found
     */
    public function testGetNotExsistingCacher()
    {
        $cachers = new DataCachers();
        $cachers->getCacher('demo');
    }

    public function testSetAndGetCachers()
    {
        $cachers = new DataCachers();

        $given = [
            'demo' => $this->getMockForAbstractClass('\Thruster\Component\DataCacher\DataCacher', [], '', false)
        ];

        $cachers->setCachers($given);

        $this->assertTrue($cachers->hasCacher('demo'));

        $this->assertEquals($given, $cachers->getCachers());
    }
}
