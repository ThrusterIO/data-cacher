<?php

namespace Thruster\Component\DataCacher\Exception;

/**
 * Class DataCacherNotFoundException
 *
 * @package Thruster\Component\DataCacher\Exception
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class DataCacherNotFoundException extends \Exception
{
    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $message = sprintf(
            'DataCacher "%s" not found',
            $name
        );
        parent::__construct($message);
    }
}
