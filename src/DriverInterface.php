<?php

namespace Thruster\Component\DataCacher;

/**
 * Interface DriverInterface
 *
 * @package Thruster\Component\DataCacher
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface DriverInterface
{
    /**
     * @param string $key
     * @param string $value
     * @param int    $ttl
     *
     * @return bool
     */
    public function set(string $key, string $value, int $ttl) : bool;

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key);

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete(string $key) : bool;

    /**
     * @param array $parts
     *
     * @return string
     */
    public function buildKey(array $parts) : string;

    /**
     * Returns Total Hits & Misses
     *
     * @return array
     */
    public function getStatistics() : array;
}
