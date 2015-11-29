<?php

namespace Thruster\Component\DataCacher;

/**
 * Class DataCacher
 *
 * @package Thruster\Component\DataCacher
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class DataCacher
{
    /**
     * @var DataCacherInterface
     */
    protected $dataCacher;

    /**
     * @var DriverInterface
     */
    protected $driver;

    /**
     * @param DriverInterface     $driver
     * @param DataCacherInterface $dataCacher
     */
    public function __construct(DriverInterface $driver, DataCacherInterface $dataCacher)
    {
        $this->driver = $driver;
        $this->dataCacher = $dataCacher;
    }

    /**
     * @return DataCacherInterface
     */
    public function getDataCacher()
    {
        return $this->dataCacher;
    }

    /**
     * @return DriverInterface
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param mixed $keyData
     *
     * @return mixed
     */
    public function get($keyData)
    {
        $key = $this->buildKey($keyData);

        return unserialize($this->getDriver()->get($key));
    }

    /**
     * @param mixed $keyData
     * @param mixed $input
     *
     * @return bool
     */
    public function cache($keyData, $input) : bool
    {
        $key = $this->buildKey($keyData);

        $ttl = $this->getDataCacher()->getTTL($input);
        $value = $this->getDataCacher()->getValue($input);

        $value = serialize($value);

        return $this->getDriver()->set($key, $value, $ttl);
    }

    /**
     * @param mixed $keyData
     *
     * @return bool
     */
    public function clear($keyData) : bool
    {
        $key = $this->buildKey($keyData);

        return $this->getDriver()->delete($key);
    }

    /**
     * @param mixed $keyData
     *
     * @return string
     */
    protected function buildKey($keyData) : string
    {
        $keyParts = $this->getDataCacher()->getKey($keyData);
        return $this->getDriver()->buildKey($keyParts);
    }
}
