<?php

namespace Thruster\Component\DataCacher;

/**
 * Interface DataCacherInterface
 *
 * @package Thruster\Component\DataCacher
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface DataCacherInterface
{
    /**
     * @return string
     */
    public static function getName() : string;

    /**
     * @param mixed $input
     *
     * @return mixed
     */
    public function getValue($input);

    /**
     * @param mixed $keyData
     *
     * @return array
     */
    public function getKey($keyData) : array;

    /**
     * @param mixed $input
     *
     * @return int
     */
    public function getTTL($input): int;
}
