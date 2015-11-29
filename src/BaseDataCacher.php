<?php

namespace Thruster\Component\DataCacher;

/**
 * Class BaseDataCacher
 *
 * @package Thruster\Component\DataCacher
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
abstract class BaseDataCacher implements DataCacherInterface
{
    /**
     * @inheritDoc
     */
    public function getValue($input)
    {
        return $input;
    }

    /**
     * @inheritDoc
     */
    public function getTTL($input): int
    {
        return 0;
    }

}
