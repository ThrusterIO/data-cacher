<?php

namespace Thruster\Component\DataCacher\Tests;

use Thruster\Component\DataCacher\DataCacher;

/**
 * Class DataCacherTest
 *
 * @package Thruster\Component\DataCacher\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class DataCacherTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $dataCacherMock = $this->getMockForAbstractClass('\Thruster\Component\DataCacher\DataCacherInterface');
        $driverMock = $this->getMockForAbstractClass('\Thruster\Component\DataCacher\DriverInterface');

        $dataCacherMock->expects($this->once())
            ->method('getKey')
            ->with(['foo', 'bar'])
            ->willReturn(['foo', 'bar']);

        $driverMock->expects($this->once())
            ->method('buildKey')
            ->with(['foo', 'bar'])
            ->willReturn('foo:bar');

        $driverMock->expects($this->once())
            ->method('get')
            ->with('foo:bar')
            ->willReturn(serialize('foobar'));

        $dataCacher = new DataCacher($driverMock, $dataCacherMock);
        $this->assertSame('foobar', $dataCacher->get(['foo', 'bar']));
    }

    public function testCache()
    {
        $dataCacherMock = $this->getMockForAbstractClass('\Thruster\Component\DataCacher\BaseDataCacher');
        $driverMock = $this->getMockForAbstractClass('\Thruster\Component\DataCacher\DriverInterface');

        $dataCacherMock->expects($this->once())
            ->method('getKey')
            ->with(['foo', 'bar'])
            ->willReturn(['foo', 'bar']);

        $driverMock->expects($this->once())
            ->method('buildKey')
            ->with(['foo', 'bar'])
            ->willReturn('foo:bar');

        $driverMock->expects($this->once())
            ->method('set')
            ->with('foo:bar', serialize('foobar'), 0)
            ->willReturn(true);

        $dataCacher = new DataCacher($driverMock, $dataCacherMock);
        $this->assertTrue($dataCacher->cache(['foo', 'bar'], 'foobar'));
    }

    public function testClear()
    {
        $dataCacherMock = $this->getMockForAbstractClass('\Thruster\Component\DataCacher\DataCacherInterface');
        $driverMock = $this->getMockForAbstractClass('\Thruster\Component\DataCacher\DriverInterface');

        $dataCacherMock->expects($this->once())
            ->method('getKey')
            ->with(['foo', 'bar'])
            ->willReturn(['foo', 'bar']);

        $driverMock->expects($this->once())
            ->method('buildKey')
            ->with(['foo', 'bar'])
            ->willReturn('foo:bar');

        $driverMock->expects($this->once())
            ->method('delete')
            ->with('foo:bar')
            ->willReturn(true);

        $dataCacher = new DataCacher($driverMock, $dataCacherMock);
        $this->assertTrue($dataCacher->clear(['foo', 'bar']));
    }
}
