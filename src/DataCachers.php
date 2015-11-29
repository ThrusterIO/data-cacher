<?php

namespace Thruster\Component\DataCacher;

use Thruster\Component\DataCacher\Exception\DataCacherNotFoundException;

/**
 * Class DataCachers
 *
 * @package Thruster\Component\DataCacher
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class DataCachers
{
    /**
     * @var DataCacher[]
     */
    protected $dataCachers;

    public function __construct()
    {
        $this->dataCachers = [];
    }

    /**
     * @param string     $cacherName
     * @param DataCacher $dataCacher
     *
     * @return $this
     */
    public function addCacher(string $cacherName, DataCacher $dataCacher) : self
    {
        $this->dataCachers[$cacherName] = $dataCacher;

        return $this;
    }

    /**
     * @param string $cacherName
     *
     * @return bool
     */
    public function hasCacher(string $cacherName) : bool
    {
        return array_key_exists($cacherName, $this->dataCachers);
    }

    /**
     * @param string $cacherName
     *
     * @return DataCacher
     */
    public function getCacher(string $cacherName) : DataCacher
    {
        if (false === $this->hasCacher($cacherName)) {
            throw new DataCacherNotFoundException($cacherName);
        }

        return $this->dataCachers[$cacherName];
    }

    /**
     * @param string $cacherName
     *
     * @return $this
     */
    public function removeCacher(string $cacherName) : self
    {
        unset($this->dataCachers[$cacherName]);

        return $this;
    }

    /**
     * @return DataCacher[]
     */
    public function getCachers()
    {
        return $this->dataCachers;
    }

    /**
     * @param DataCacher[] $dataCachers
     *
     * @return $this
     */
    public function setCachers($dataCachers)
    {
        $this->dataCachers = $dataCachers;

        return $this;
    }
}
